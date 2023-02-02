<?php

namespace DAO;

use ContactModel;

class ContactDAO {

    public function __construct(){

    }

    /*================================================================
     *             Selecting data from Database                      *
     *===============================================================*/
    public function SelectContact(){

        try {
            //database connection
            $conn = new Connection();

            //Selecting data
            $query = 'SELECT * FROM phonebook.contacts';

            //printing the data
            $this->extracted($conn, $query);

        }catch (\PDOException $e){
            echo "Error: ".$e->getMessage();
        }
    }

    /*================================================================
     *             Selecting data by ID from Database                *
     *===============================================================*/
    public function selectbyIDContact ($id){

        try {
            //get the connection
            $conn = new Connection();

            //Selecting data by ID
            $query = "SELECT * FROM phonebook.contacts
                        WHERE id_contact = $id";

            //printing the data
            $this->extracted($conn, $query);

        }catch (\PDOException $e){
            echo "Error: ".$e->getMessage();
        }
    }
    /*================================================================
     *              Inserting data into Database                     *
     *===============================================================*/
    public function InsertContact( ContactModel $contact)
    {

        try {

            $firstName = $contact->getFirstName();
            $lastName = $contact->getLastName();
            $company = $contact->getCompany();
            $phoneNumber = $contact->getPhoneNumber();
            $email = $contact->getEmail();
            $birthday = date_create($contact->getBirthday());
            $birth = date_format($birthday,'Y-m-d');
            $note = $contact->getNote();

            $conn = new Connection();

           # $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

           $query = " INSERT INTO phonebook.contacts (contact_firstName,contact_lastName,contact_company,contact_phoneNumber,contact_email,contact_birthday,contact_notes)
                        VALUES ('$firstName','$lastName','$company',$phoneNumber,'$email','$birth','$note')";

            $stmt = $conn->connection()->prepare($query);
            $stmt->execute();

            echo "Data was inserted successfully";

        }catch (\PDOException $e){
            echo "Error: <br> -".$e->getMessage(). ' <br> -'.$e->getLine(). ' <br> -'.$e->getCode();

        }
    }

    /**
     * @param Connection $conn
     * @param string $query
     * @return void
     */

    /*================================================================
     *                       Printing data                           *
     *===============================================================*/
    public function extracted(Connection $conn, string $query): void
    {
        $stmt = $conn->connection()->prepare($query);
        $stmt->execute();
        //var_dump($stmt->fetch());
        while ($rows = $stmt->fetch()) {

           // echo "<br>"."<hr>";
            //echo $rows['id_contact'] . '<br>';
            echo $rows['contact_firstName'] . '<br>';
            echo $rows['contact_lastName'] . '<br>';
            //echo $rows['contact_company'] . '<br>';
            //echo $rows['contact_phoneNumber'] . '<br>';
            //echo $rows['contact_email'] . '<br>';
            //echo $rows['contact_birthday'] . '<br>';
            //echo $rows['contact_notes'] . '<br>';

           // echo "<br>"."<hr>";
        }
    }


}