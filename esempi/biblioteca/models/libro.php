<?php
class Libro
	{
	private $conn;
	private $table_name = "books";
	// proprietà di un libro
	public $ISBN;
	public $Autore;
	public $Titolo;
	// costruttore
	public function __construct($db)
		{
		$this->conn = $db;
		}
	// READ libri
	function read()
		{
		// select all
		$query = "SELECT
                        a.ISBN, a.Autore, a.Titolo
                    FROM
                   " . $this->table_name . " a ";
		$stmt = $this->conn->prepare($query);
		// execute query
		$stmt->execute();
		return $stmt;
		}
	// CREARE LIBRO
	// AGGIORNARE LIBRO
	// CANCELLARE LIBRO
	}
?>