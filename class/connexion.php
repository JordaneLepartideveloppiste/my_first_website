<?php
	class Connexion {
		private $login;
		private $pass;
		private $db;
		private $connec;

		/**
		 * Construit un objet Connexion
		 * @param string $db 
		 * 		Nom de la base de donnée à utiliser
		 * @param string $login
		 * 		Utilisateur de la base de données, par défaut root
		 * @param string $pass
		 * 		Mot de passe de l'utilisateur de la base de données par defaut vide
		 * @uses connexion()
		 **/
		public function __construct($db, $login ='root', $pass='root'){
			$this->login = $login;
			$this->pass = $pass;
			$this->db = $db;
			$this->connexion();
		}

		/**
		 * Créer une connexion à l'aide du connecteur de base de donnée PDO
		 * @see PDO
		 * @note [renvoie ici le contenu sous forme d'un objet]
		 **/
		private function connexion(){
			try
			{
				$bdd = new PDO('mysql:host=localhost;dbname='.$this->db, $this->login, $this->pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
				$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
				$bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
				$this->connec = $bdd;
			}
			catch (PDOException $e)
			{
				$msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
				die($msg);
			}
		}

		/**
		 * Permet d'executer et de récupérer le contenu d'une requête SELECT
		 * @param string $sql
		 * 		requete de type SELECT à executer
		 * @return PDOStatement $res
		 * 		retourne le resultat sous forme d'une collection d'objets
		 **/
		public function select($sql){
			$res = $this->connec->query($sql);
			return $res;
		}

		/**
		 * Permet d'executer une requête de type INSERT
		 * @param string $sql
		 * 		requete de type INSERT à executer
		 * @return integer
		 * 		retourne le dernier identifiant ajouté en base de données
		 **/
		public function insert($sql){
			$this->connec->query($sql);
			return $this->connec->lastInsertId();
		}

		/**
		 * Permet d'executer une requête de type UPDATE ou DELETE
		 * @param string $sql
		 * 		requete de type UPDATE/DELETE à executer
		 * @return integer
		 * 		retourne le nombre de lignes touchée par la requête
		 **/
		public function update_delete($sql){
			$nb = $this->connec->query($sql);
			return $nb->rowCount();
		}
	}
?>