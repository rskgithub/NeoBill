<?php
/**
 * NullRegistrar.class.php
 *
 * This file contains the definition of the NullRegistrar class.
 *
 * @package resellerclub
 * @author John Diamond <jdiamond@solid-state.org>
 * @copyright John Diamond <jdiamond@solid-state.org>
 * @license http://www.opensource.org/licenses/gpl-license.php GNU Public License
 */

// This module uses the phpwhois project (www.phpwhois.org) to perform lookups
require_once BASE_PATH . "modules/nullregistrar/phpwhois/whois.main.php";
require_once BASE_PATH . "modules/RegistrarModule.class.php";
/**
 * NullRegistrar
 *
 * Provides a default "null" registrar, which simply interacts with no registrar
 * when performing the basic domain functions.
 *
 * @package nullregistrar
 * @author John Diamond <jdiamond@solid-state.org>
 */
class NullRegistrar extends RegistrarModule
{
  /**
   * @var string Configuration page
   */
  protected $configPage = "nr_config";

  /**
   * @var string Long description
   */
  protected $description = "Null Registrar Module";

  /**
   * @var string Module name
   */
  protected $name = "nullregistrar";

  /**
   * @var string Short Description
   */
  protected $sDescription = "Null Registrar";

  /**
   * @var integer Version
   */
  protected $version = 2;

  /**
   * @var Whois The PHPWhois object
   */
  protected $whois = null;

  /**
   * Check Domain Availability
   *
   * @return boolean True for all requests
   */
  function checkAvailability( $fqdn )
  {
    $this->checkEnabled();
    $result = $this->whois->Lookup( $fqdn );
    return $result['regrinfo']['registered'] == "no";
  }

  /**
   * Initialize Null Registrar Module
   *
   * Invoked when the module is loaded.  Call the parent method first, then
   * load settings.
   *
   * @return boolean True for success
   */
  function init()
  {
    parent::init();

    // Instantiate a PHPWhois object and turn off deep whois results
    $this->whois = new Whois();
    $this->whois->deep_whois = false;
  }

  /**
   * Install Null Registrar Module
   *
   * Invoked when the module is installed.  Calls the parent first, which does
   * most of the work, then saves the default settings to the DB.
   */
  function install()
  {
    parent::install();
    $this->saveSettings();
  }

  /**
   * Verify Domain is Transfer Eligible
   *
   * @param string $fqdn Domain name
   * @return boolean True for all requests
   */
  function isTransferable( $fqdn )
  {
    $this->checkEnabled();
    return !$this->checkAvailability( $fqdn );
  }

  /**
   * Register a New Domain
   *
   * Registers a new domain name without requiring any Reseller Club specific
   * information.
   *
   * @param string $domainName Domain name to be registered (without TLD)
   * @param string $TLD Domain TLD to register
   * @param integer $term Number of years to register the domain for
   * @param array $contacts Admin, billing, and technical contact DBOs
   * @param AccountDBO $accountDBO The account that is registering this domain
   * @return boolean True for all requests
   */
  function registerNewDomain( $domainName, $TLD, $term, $contacts, $accountDBO )
  {
    $this->checkEnabled();
    return true;
  }

  /**
   * Renew a Domain
   *
   * @param DomainServicePurchaseDBO $purchseDBO The domain to be renewed
   * @param integer $renewTerms Number of years to renew for
   * @return boolean True for all requests
   */
  function renewDomain( $purchaseDBO, $renewTerms )
  {
    $this->checkEnabled();
    return true;
  }

  /**
   * Save Null Registrar Settings
   */
  function saveSettings()
  {
  }

  /**
   * Transfer a Domain
   *
   * @param string $domainName Domain name to be transferred (without TLD)
   * @param string $TLD Domain TLD
   * @param integer $term Number of years to renew domain for
   * @param string $secret The domain secret
   * @param array An associative array of ContactDBO's (admin, billing, and tech)
   * @param AccountDBO $accountDBO The account that is transferring this domain
   * @return boolean True for all requests
   */
  function transferDomain( $domainName, $TLD, $term, $secret, $contacts, $accountDBO )
  {
    // Make sure this module is enabled
    $this->checkEnabled();
    return true;
  }
}
?>
