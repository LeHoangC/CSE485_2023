<?php 
    class admin {
        private $emailAD;
        private $passAD;

        public function __construct($emailAD, $passAD)
        {
            $this->emailAD = $emailAD;
            $this->passAD = $passAD;
        }

        public function getEmailAD()
        {
                return $this->emailAD;
        }

        public function setEmailAD($emailAD)
        {
                $this->emailAD = $emailAD;

                return $this;
        }

        public function getPassAD()
        {
                return $this->passAD;
        }

        public function setPassAD($passAD)
        {
                $this->passAD = $passAD;

                return $this;
        }
    }