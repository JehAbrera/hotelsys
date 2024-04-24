<?php
session_start();
include 'Database.php';

class Reservation extends Database
{
    private $days, $dayRate, $addChar, $subTot, $discRate, $discTot, $addTot, $total;

    protected function isValidDate($from, $to)
    {
        $start = new DateTime($from);
        $end = new DateTime($to);
        if ($start >= $end) {
            return false;
        }
        return true;
    }

    protected function isValidPhone($phone)
    {
        $justNums = preg_replace("/[^0-9]/", '', $phone);

        if (!preg_match("/^09[0-9]{9}$/", $justNums)) {
            return false;
        }
        return true;
    }

    // Create //
    public function addReservation($name, $phone, $date, $time, $from, $to, $room, $cap, $payment, $days, $sub, $disc, $add, $total, $status)
    {
        $sql = "INSERT INTO reservations VALUES ('', ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->db_connect()->prepare($sql);
        $stmt->execute([$name, $phone, $date, $time, $from, $to, $room, $cap, $payment, $days, $sub, $disc, $add, $total, $status]);
        echo "<script> alert ('Reservation has been submitted!')</script>";
        return header('Location: Home.php');
    }

    // Read //
    public function viewList($page)
    {
        if (isset($_SESSION['view'])) {
            unset($_SESSION['view']);
        }
        $viewArray = [];

        // Query reservations
        $sql = "SELECT * FROM reservations WHERE status = ?";
        $stmt = $this->db_connect()->prepare($sql);

        // Add query parameter depending on status to query
        $_SESSION['page'] = $page;
        $stmt->execute([$page]);
        // Get row count from query
        if ($stmt->rowCount() < 1) {
            $_SESSION['nodata'] = "No reservations at $page status.";
            return header('Location: Admin.php');
        }
        while ($row = $stmt->fetch()) {
            array_push($viewArray, [
                $row['reservationId'], $row['name'], $row['contact'], $row['date_reserved'], $row['time_reserved'],
                $row['reservation_from'], $row['reservation_to'], $row['room'], $row['capacity'], $row['payment'], $row['days'], $row['subtotal'],
                $row['discount'], $row['addtnl'], $row['total'], $row['status']
            ]);
        }
        $_SESSION['view'] = $viewArray;
        return header('Location: Admin.php');
    }
    public function findReserve($page, $name) {
        unset($_SESSION['view']);
        $viewArray = [];

        $sql = "SELECT * FROM reservations WHERE name LIKE ? and status = ?";
        $stmt = $this->db_connect()->prepare($sql);
        $stmt->execute(["%".strtolower($name)."%", $page]);

        if ($stmt->rowCount() < 1) {
            $_SESSION['nodata'] = "Name not found.";
            return header('Location: Admin.php');
        }
        while ($row = $stmt->fetch()) {
            array_push($viewArray, [
                $row['reservationId'], $row['name'], $row['contact'], $row['date_reserved'], $row['time_reserved'],
                $row['reservation_from'], $row['reservation_to'], $row['room'], $row['capacity'], $row['payment'], $row['days'], $row['subtotal'],
                $row['discount'], $row['addtnl'], $row['total'], $row['status']
            ]);
        }
        $_SESSION['view'] = $viewArray;
        return header('Location: Admin.php');
    }

    // Update //
    public function updateStatus($update, $id)
    {
        $sql = "UPDATE reservations SET status = ? WHERE reservationId = ?";
        $stmt = $this->db_connect()->prepare($sql);
        $stmt->execute([$update, $id]);
        $this->viewList($update);
    }

    // Delete //
    public function deleteInfo($id)
    {
        $sql = "DELETE FROM reservations WHERE reservationId = ?";
        $stmt = $this->db_connect()->prepare($sql);
        $stmt->execute([$id]);
        $this->viewList("Pending");
    }

    // Compute Total //
    public function computeTotal($name, $phone, $from, $to, $room, $cap, $payment, $datetime)
    {
        if (!$this->isValidDate($from, $to)) {
            $_SESSION['data'] = [
                'error' => "Invalid date selected!"
            ];
            return header('Location: Reserve.php');
        }
        if (!$this->isValidPhone($phone)) {
            $_SESSION['data'] = [
                'error' => "Invalid phone number!"
            ];
            return header('Location: Reserve.php');
        }

        $arr = explode("-", $datetime);

        $this->setDays($from, $to);
        $this->setRate($room, $cap);
        $this->setAddChar($payment);
        $this->setSub();
        $this->setDiscTot();
        $this->setAddTot();
        $this->setTotal();

        $_SESSION['data'] = [
            'name' => $name,
            'phone' => $phone,
            'from' => $from,
            'to' => $to,
            'room' => $room,
            'cap' => $cap,
            'payment' => $payment,
            'date' => $arr[0],
            'time' => $arr[1],
            'days' => $this->getDays(),
            'sub' => $this->getSub(),
            'add' => $this->getAddTot(),
            'disc' => $this->getDiscTot(),
            'total' => $this->getTotal(),
        ];
        return header('Location: Reserve.php?step=overview');
    }

    // Assign values //
    protected function setDays($from, $to)
    {
        $start = new DateTime($from);
        $end = new DateTime($to);
        $this->days = ($start->diff($end))->days;
    }
    protected function getDays()
    {
        return $this->days;
    }
    protected function setRate($room, $cap)
    {
        switch ($cap) {
            case 'Single':
                switch ($room) {
                    case 'Suite':
                        $this->dayRate = 100.00;
                        break;
                    case 'Deluxe':
                        $this->dayRate = 300.00;
                        break;
                    case 'Luxury':
                        $this->dayRate = 500.00;
                        break;
                }
                break;
            case 'Double':
                switch ($room) {
                    case 'Suite':
                        $this->dayRate = 200.00;
                        break;
                    case 'Deluxe':
                        $this->dayRate = 500.00;
                        break;
                    case 'Luxury':
                        $this->dayRate = 800.00;
                        break;
                }
                break;
            case 'Family':
                switch ($room) {
                    case 'Suite':
                        $this->dayRate = 500.00;
                        break;
                    case 'Deluxe':
                        $this->dayRate = 750.00;
                        break;
                    case 'Luxury':
                        $this->dayRate = 1000.00;
                        break;
                }
                break;
        }
    }
    protected function getRate()
    {
        return $this->dayRate;
    }
    protected function setAddChar($payment)
    {
        switch ($payment) {
            case 'Cash':
                $this->addChar = 0;
                if ($this->getDays() >= 3 && $this->getDays() <= 5) {
                    $this->setDiscRate(0.10);
                } elseif ($this->getDays() >= 6) {
                    $this->setDiscRate(0.15);
                } else {
                    $this->setDiscRate(0);
                }
                break;
            case 'Cheque':
                $this->addChar = 0.05;
                break;
            case 'Credit Card':
                $this->addChar = 0.1;
                break;
        }
    }
    protected function getAddChar()
    {
        return $this->addChar;
    }
    protected function setSub()
    {
        $this->subTot = $this->getRate() * $this->getDays();
    }
    protected function getSub()
    {
        return $this->subTot;
    }
    protected function setDiscRate($val)
    {
        $this->discRate = $val;
    }
    protected function getDiscRate()
    {
        return $this->discRate;
    }
    protected function setDiscTot()
    {
        $this->discTot = $this->getSub() * $this->getDiscRate();
    }
    protected function getDiscTot()
    {
        return $this->discTot;
    }
    protected function setAddTot()
    {
        $this->addTot = $this->getSub() * $this->getAddChar();
    }
    protected function getAddTot()
    {
        return $this->addTot;
    }
    protected function setTotal()
    {
        $this->total = $this->getSub() + $this->getAddTot() - $this->getDiscTot();
    }
    protected function getTotal()
    {
        return $this->total;
    }


    // Login //
    public function validateLogin($user, $pass)
    {
        $hash = hash('sha256', $pass);
        $sql = "SELECT COUNT(*) FROM adminlogin WHERE username = ? AND password = ?";
        $stmt = $this->db_connect()->prepare($sql);
        $stmt->execute([$user, $hash]);

        if ($stmt->fetchColumn() > 0) {
            $_SESSION['isLogged'] = true;
            $this->viewList("Pending");
        } else {
            $_SESSION['data'] = [
                'error' => "Invalid login username or password!"
            ];
            return header('Location: Login.php');
        }
    }
}
