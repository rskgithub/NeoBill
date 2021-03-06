<?php
/**
 * NoteValidator.class.php
 *
 * This file contains the definition of the NoteValidator class.
 *
 * @package SolidWorks
 * @author John Diamond <jdiamond@solid-state.org>
 * @copyright John Diamond <jdiamond@solid-state.org>
 * @license http://www.opensource.org/licenses/gpl-license.php GNU Public License
 */

/**
 * NoteValidator
 *
 * @package SolidWorks
 * @author John Diamond <jdiamond@solid-state.org>
 */
class NoteValidator extends FieldValidator {
	/**
	 * @var integer Account ID
	 */
	protected $accountID = null;

	/**
	 * Set Account ID
	 *
	 * @param integer $id Account ID
	 */
	public function setAccountID( $id ) {
		$this->accountID = $id;
	}

	/**
	 * Validate a Note ID
	 *
	 * Verifies that the note exists.
	 *
	 * @param string $data Field data
	 * @return NoteDBO Note DBO for this Note ID
	 * @throws RecordNotFoundException
	 */
	public function validate( $data ) {
		$data = parent::validate( $data );

		try {
			$noteDBO = load_NoteDBO( intval( $data ) );
		}
		catch ( DBNoRowsFoundException $e ) {
			throw new RecordNotFoundException( "Note" );
		}

		// Verify that this note is for a specific account
		if ( isset( $this->accountID ) && $noteDBO->getAccountID() != $this->accountID ) {
			throw new FieldException( "Note/Account mismatch" );
		}

		return $noteDBO;
	}
}
?>