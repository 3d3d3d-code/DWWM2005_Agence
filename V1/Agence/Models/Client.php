<?php
/**
 * Client.php
 *
 * An one entity of the client
 *
 * @author Jjeanniard
 * @version 0.0.1
 */
namespace Agence\Models;

class Client
{
    private int $client_id;

    private string $client_lastname;

    private string $client_firstname;

    private string $client_email;

    private string $client_phone;

    private string $client_added;

    private string $client_password;

    private ?string $com_code = null;

    public function toArray(){
        $rows = [];

        foreach ($this as $key => $data){
            $rows[$key] = $data;
        }

        return $rows;
    }

    /**
     * @return int
     */
    public function getClientId(): int
    {
        return $this->client_id;
    }

    /**
     * @param int $client_id
     */
    public function setClientId(int $client_id): void
    {
        $this->client_id = $client_id;
    }

    /**
     * @return string
     */
    public function getClientLastname(): string
    {
        return $this->client_lastname;
    }

    /**
     * @param string $client_lastname
     */
    public function setClientLastname(string $client_lastname): void
    {
        $this->client_lastname = $client_lastname;
    }

    /**
     * @return string
     */
    public function getClientFirstname(): string
    {
        return $this->client_firstname;
    }

    /**
     * @param string $client_firstname
     */
    public function setClientFirstname(string $client_firstname): void
    {
        $this->client_firstname = $client_firstname;
    }

    /**
     * @return string
     */
    public function getClientEmail(): string
    {
        return $this->client_email;
    }

    /**
     * @param string $client_email
     */
    public function setClientEmail(string $client_email): void
    {
        $this->client_email = $client_email;
    }

    /**
     * @return string
     */
    public function getClientPhone(): string
    {
        return $this->client_phone;
    }

    /**
     * @param string $client_phone
     */
    public function setClientPhone(string $client_phone): void
    {
        $this->client_phone = $client_phone;
    }

    /**
     * @return string
     */
    public function getClientAdded(): string
    {
        return $this->client_added;
    }

    public function setClientAdded(): void
    {
        $this->client_added = date('y-m-d');
    }

    /**
     * @return string
     */
    public function getClientPassword(): string
    {
        return $this->client_password;
    }

    /**
     * @param string $client_password
     */
    public function setClientPassword(string $client_password): void
    {
        $this->client_password = password_hash($client_password, PASSWORD_BCRYPT);
    }

    /**
     * @return string
     */
    public function getComCode(): string
    {
        return $this->com_code;
    }

    /**
     * @param string $com_code
     */
    public function setComCode(string $com_code): void
    {
        $this->com_code = $com_code;
    }
}