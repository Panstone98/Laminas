<?php
namespace MasterBewerbung\Model;

use DomainException;	

class DummyBewerberRepository implements BewerberRepositoryInterface
{
	/**
	Dummy data
	*/
	private $data = [
		1 => [
			'idBewerbungscode' => 1,
			'vorname' => 'Max',
			'nachname' => 'Mustermann',
			'strasse' => 'Am Huegel',
			'hausnummer' => 1,
			'plz' => 93011,
			'ort' => 'Regensburg',
			'idLand' => 'Deutschland',
			'geburtsdatum' => '01.01.1992',
			'geschlecht' => 'm',
			'email' => 'Max.Mustermann42@web.de',
			'kuerzelStudiengang' => 'Winfo',
			'idSemester' => 'Sommersemester 2021',
			'schwerpunktId' => '12',
			'letzteHochschule' => 'Uni Regensburg',
			'letzteHochschulart' => 'Universität',
			'studiengang' => 'Wirtschaftsinformatik',
			'abschluss' => 'Bachelor',
			'abschlussnote' => '1.3',
			'erreichteCredits' => '180',
			'internationalStudent' => 'nein',
			'abschlussnoteBerechnet' => 'XXX',
			'maxNote' => 'XXX',
			'minNote' => 'XXX',
			'praktika' => 'knowis',
			'berufserfahrung' => 'Werkstudent bei Continental',
			'hinweise' => '-',
			'erstellung' => '01.12.2020',
			'modifikation' => '01.01.2021',
			'abgeschickt' => false,			
		],
		2 => [
			'idBewerbungscode' => 2,
			'vorname' => 'Anna',
			'nachname' => 'Mustermann',
			'strasse' => 'Am Berg',
			'hausnummer' => 5,
			'plz' => 93011,
			'ort' => 'Regensburg',
			'geschlecht' => 'w',
			'modifikation' => '01.01.2021',
			'abgeschickt' => true,	
			'status' => false,	
			'versandfreigabe' => false,
			'unterlagenEingang' => true,
		],
	];
	
	 public function getBewerbungsfrist(){
	 	return date("31.01.2022");
	 }
	
	/**
	* {@inheritDoc}
	*/
   	public function updateBewerber($bewerber){
   	
   	}
    
	
	/**
	* {@inheritDoc}
	*/
	public function generateIdBewerbungscode()
	{
		return rand();
	}


	/**
	* {@inheritDoc}
	*/
	public function findAllBewerber()
	{
		return array_map(function ($bewerber) {
		    return new Bewerber(
		        $bewerber['idBewerbungscode'],
		        $bewerber['vorname'],
		        $bewerber['nachname'],
		        $bewerber['strasse'],
		        $bewerber['hausnummer'],
		        $bewerber['plz'],
		        $bewerber['ort'],
		        $bewerber['idland'],
		        $bewerber['geburtstdatum'],
		    );
		}, $this->data);
	}

	/**
	* {@inheritDoc}
	*/
	public function findBewerber($idBewerbungscode)
	{
		//if (! isset($this->data[$idBewerbungscode])) {
		//	throw new DomainException(sprintf('Bewerber by idBewerbungscode "%s" not found', $idBewerbungscode));
		//}

		$bewerber = new Bewerber();
		if($this->data[$idBewerbungscode] == 0) return 0;
		$bewerber->exchangeArray($this->data[$idBewerbungscode]);

		return $bewerber;
	}
	
	/**
	* {@inheritDoc}
	*/
	public function createBewerber($bewerber)
	{
		
	}
	
	/**
	* {@inheritDoc}
	*/
	public function getAllStudiengaenge()
	{
		return $studiengaenge = [
			"0" => new Studiengang("Betriebswirtschaftslehre", "Business Administration", "BWL"),
			"1" => new Studiengang("Immobilienwirtschaft", " Real Estate Managment", "IMMO"),
			"2" => new Studiengang("Volkswirtschaftslehre", "Economics", "VWL"),
		];
	}
	
	/**
	* {@inheritDoc}
	*/
	public function getAllLaender()
	{
		return $laender = [
			"0" => new Land("AD", "Andorra"),
			"1" => new Land("DE", "Deutschland"),
			"2" => new Land("EE", "Estland"),
		];
	}
}
