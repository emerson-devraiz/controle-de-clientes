<?php

namespace cleanarchitecture\domain\company\entity;

class Company
{
    private int $id;
    private string $name;
    private string $cnpj;
    private string $email;
    private string $registrationDateTime;

    /**
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of cnpj
     */
    public function getCnpj(): string
    {
        return $this->cnpj;
    }

    /**
     * Set the value of cnpj
     */
    public function setCnpj(string $cnpj): self
    {
        $this->cnpj = $cnpj;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of registrationDateTime
     */
    public function getRegistrationDateTime(): string
    {
        return $this->registrationDateTime;
    }

    /**
     * Set the value of registrationDateTime
     */
    public function setRegistrationDateTime(string $registrationDateTime): self
    {
        $this->registrationDateTime = $registrationDateTime;

        return $this;
    }
}
