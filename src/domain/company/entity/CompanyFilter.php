<?php

namespace cleanarchitecture\domain\company\entity;

class CompanyFilter
{
    private string $name = '';

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
     * Get the value of filterName
     */
    public function getFilterName(): string
    {
        if ($this->name !== '') {
            return "WHERE (name LIKE '" . $this->name . "%')";
        }

        return '';
    }
}
