<?php
namespace MasterBewerbung\Model;

interface BewerberRepositoryInterface
{

    /**
     * Generates new unique idBewerbungscode
     *
     * @return idBewerbungscode
     */
    public function generateIdBewerbungscode();
  	
    /**
     * Return a set of all Bewerber
     *
     * @return Bewerber[]
     */
    public function findAllBewerber();

    /**
     * Return a single Bewerber.
     *
     * @param  int $idBewerbungscode Identifier of the post to return.
     * @return Bewerber bewerber with the corresponding ID or null if not found in database
     */
    public function findBewerber($idBewerbungscode);
    
    /**
     * Creates a new single Bewerber in the corresponding database.
     *
     * @param  Bewerber $bewerber new bewerber to persist.
     *
     */
    public function createBewerber($bewerber);
    
    /**
     * Updates an existing Bewerber in the corresponding database.
     *
     * @param  Bewerber $bewerber bewerber to update.
     *
     */
    public function updateBewerber($bewerber);
    
    
    /**
     * Returns all available Studiengaenge.
     *
     * @return Studiengang[]
     */
    public function getAllStudiengaenge();    
    
      /**
     * Returns all available Laender.
     *
     * @return Land[]
     */
    public function getAllLaender();
    /**
     * Return a set of all Bewerber
     *
     * @return Bewerbungsfrist
     */
    public function getBewerbungsfrist();
}
