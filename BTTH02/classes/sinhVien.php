<?php 
    class sinhvien 
    {
        private $tenSV;
        private $ngaysinhSV;
        private $emailSV;
        private $sdtSV;
        private $passSV;

        public function __construct($tenSV, $ngaysinhSV, $emailSV, $sdtSV, $passSV)
        {
            $this->tenSV = $tenSV;
            $this->ngaysinhSV = $ngaysinhSV;
            $this->emailSV = $emailSV;
            $this->sdtSV = $sdtSV;
            $this->passSV = $passSV;
        }

        public function getTenSV()
        {
                return $this->tenSV;
        }

        public function setTenSV($tenSV)
        {
                $this->tenSV = $tenSV;
        }

        public function getNgaysinhSV()
        {
                return $this->ngaysinhSV;
        }

        public function setNgaysinhSV($ngaysinhSV)
        {
                $this->ngaysinhSV = $ngaysinhSV;
        }

        public function getEmailSV()
        {
                return $this->emailSV;
        }

        public function setEmailSV($emailSV)
        {
                $this->emailSV = $emailSV;
        }

        public function getSdtSV()
        {
                return $this->sdtSV;
        }

        public function setSdtSV($sdtSV)
        {
                $this->sdtSV = $sdtSV;
        }

        public function getPassSV()
        {
                return $this->passSV;
        }

        public function setPassSV($passSV)
        {
                $this->passSV = $passSV;
        }
    }