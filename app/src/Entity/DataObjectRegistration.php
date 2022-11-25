<?php

namespace App\Entity;

class DataObjectRegistration
{
    private ?string $username = null;
    private ?string $password = null;
    private ?string $name = null;
    private ?string $address = null;
    private ?string $phone = null;

    /**
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @param string|null $username
     * @return DataObjectRegistration
     */
    public function setUsername(?string $username): DataObjectRegistration
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param string|null $password
     * @return DataObjectRegistration
     */
    public function setPassword(?string $password): DataObjectRegistration
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return DataObjectRegistration
     */
    public function setName(?string $name): DataObjectRegistration
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * @param string|null $address
     * @return DataObjectRegistration
     */
    public function setAddress(?string $address): DataObjectRegistration
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string|null $phone
     * @return DataObjectRegistration
     */
    public function setPhone(?string $phone): DataObjectRegistration
    {
        $this->phone = $phone;
        return $this;
    }



}