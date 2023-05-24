<?php
    class giangvien 
    {
        private $tenGV;
        private $emailGV;
        private $sdtGV;
        private $passGV;

        public function __construct($tenGV, $emailGV, $sdtGV, $passGV)
        {
            $this->tenGV = $tenGV;
            $this->emailGV = $emailGV;
            $this->sdtGV = $sdtGV;
            $this->passGV = $passGV;
        }

        public function getTenGV()
        {
                return $this->tenGV;
        }

        public function setTenGV($tenGV)
        {
                $this->tenGV = $tenGV;
        }

        public function getEmailGV()
        {
                return $this->emailGV;
        }

        public function setEmailGV($emailGV)
        {
                $this->emailGV = $emailGV;
        }

        public function getSdtGV()
        {
                return $this->sdtGV;
        }

        public function setSdtGV($sdtGV)
        {
                $this->sdtGV = $sdtGV;
        }

        public function getPassGV()
        {
                return $this->passGV;
        }

        public function setPassGV($passGV)
        {
                $this->passGV = $passGV;

                return $this;
        }
    }