<?php


/**
 * Base class that represents a row from the 'esq_websites' table.
 *
 * 
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseWebsite extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'WebsitePeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        WebsitePeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        string
	 */
	protected $id;

	/**
	 * The value for the cg_id field.
	 * @var        string
	 */
	protected $cg_id;

	/**
	 * The value for the cim_customer_profile_id field.
	 * @var        string
	 */
	protected $cim_customer_profile_id;

	/**
	 * The value for the cim_payment_profile_id field.
	 * @var        string
	 */
	protected $cim_payment_profile_id;

	/**
	 * The value for the customer_id field.
	 * @var        string
	 */
	protected $customer_id;

	/**
	 * The value for the type field.
	 * @var        int
	 */
	protected $type;

	/**
	 * The value for the rank field.
	 * @var        int
	 */
	protected $rank;

	/**
	 * The value for the firm_name field.
	 * @var        string
	 */
	protected $firm_name;

	/**
	 * The value for the firm_type field.
	 * @var        string
	 */
	protected $firm_type;

	/**
	 * The value for the website_name field.
	 * @var        string
	 */
	protected $website_name;

	/**
	 * The value for the primary_domain_id field.
	 * @var        string
	 */
	protected $primary_domain_id;

	/**
	 * The value for the email field.
	 * @var        string
	 */
	protected $email;

	/**
	 * The value for the address field.
	 * @var        string
	 */
	protected $address;

	/**
	 * The value for the city field.
	 * @var        string
	 */
	protected $city;

	/**
	 * The value for the state field.
	 * @var        string
	 */
	protected $state;

	/**
	 * The value for the zip field.
	 * @var        string
	 */
	protected $zip;

	/**
	 * The value for the phone field.
	 * @var        string
	 */
	protected $phone;

	/**
	 * The value for the fax field.
	 * @var        string
	 */
	protected $fax;

	/**
	 * The value for the template_id field.
	 * @var        string
	 */
	protected $template_id;

	/**
	 * The value for the website_attribute_id field.
	 * @var        string
	 */
	protected $website_attribute_id;

	/**
	 * The value for the status field.
	 * @var        int
	 */
	protected $status;

	/**
	 * The value for the path field.
	 * @var        string
	 */
	protected $path;

	/**
	 * The value for the host_id field.
	 * @var        string
	 */
	protected $host_id;

	/**
	 * The value for the analytics_code field.
	 * @var        string
	 */
	protected $analytics_code;

	/**
	 * The value for the payment_account_id field.
	 * @var        string
	 */
	protected $payment_account_id;

	/**
	 * The value for the meta_description field.
	 * @var        string
	 */
	protected $meta_description;

	/**
	 * The value for the meta_keywords field.
	 * @var        string
	 */
	protected $meta_keywords;

	/**
	 * The value for the social_media field.
	 * @var        string
	 */
	protected $social_media;

	/**
	 * The value for the last_payment_update field.
	 * @var        string
	 */
	protected $last_payment_update;

	/**
	 * The value for the last_billing_date field.
	 * @var        string
	 */
	protected $last_billing_date;

	/**
	 * The value for the cancelled_at field.
	 * @var        string
	 */
	protected $cancelled_at;

	/**
	 * The value for the created_at field.
	 * @var        string
	 */
	protected $created_at;

	/**
	 * The value for the updated_at field.
	 * @var        string
	 */
	protected $updated_at;

	/**
	 * @var        Customer
	 */
	protected $aCustomer;

	/**
	 * @var        Domain
	 */
	protected $aPrimaryDomain;

	/**
	 * @var        WebsiteTemplate
	 */
	protected $aWebsiteTemplate;

	/**
	 * @var        WebsiteAttribute
	 */
	protected $aWebsiteAttribute;

	/**
	 * @var        Host
	 */
	protected $aHost;

	/**
	 * @var        array CheddarGetterNotification[] Collection to store aggregation of CheddarGetterNotification objects.
	 */
	protected $collCheddarGetterNotifications;

	/**
	 * @var        array Domain[] Collection to store aggregation of Domain objects.
	 */
	protected $collDomains;

	/**
	 * @var        array CouponUsage[] Collection to store aggregation of CouponUsage objects.
	 */
	protected $collCouponUsages;

	/**
	 * @var        array EmailAccount[] Collection to store aggregation of EmailAccount objects.
	 */
	protected $collEmailAccounts;

	/**
	 * @var        array Page[] Collection to store aggregation of Page objects.
	 */
	protected $collPages;

	/**
	 * @var        array ClientMessage[] Collection to store aggregation of ClientMessage objects.
	 */
	protected $collClientMessages;

	/**
	 * @var        array TemplateCustomization[] Collection to store aggregation of TemplateCustomization objects.
	 */
	protected $collTemplateCustomizations;

	/**
	 * @var        array Coupon[] Collection to store aggregation of Coupon objects.
	 */
	protected $collCoupons;

	/**
	 * Flag to prevent endless save loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInSave = false;

	/**
	 * Flag to prevent endless validation loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInValidation = false;

	// sortable behavior
	
	/**
	 * Queries to be executed in the save transaction
	 * @var        array
	 */
	protected $sortableQueries = array();

	/**
	 * Get the [id] column value.
	 * 
	 * @return     string
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [cg_id] column value.
	 * 
	 * @return     string
	 */
	public function getCgId()
	{
		return $this->cg_id;
	}

	/**
	 * Get the [cim_customer_profile_id] column value.
	 * 
	 * @return     string
	 */
	public function getCimCustomerProfileId()
	{
		return $this->cim_customer_profile_id;
	}

	/**
	 * Get the [cim_payment_profile_id] column value.
	 * 
	 * @return     string
	 */
	public function getCimPaymentProfileId()
	{
		return $this->cim_payment_profile_id;
	}

	/**
	 * Get the [customer_id] column value.
	 * 
	 * @return     string
	 */
	public function getCustomerId()
	{
		return $this->customer_id;
	}

	/**
	 * Get the [type] column value.
	 * 
	 * @return     int
	 */
	public function getType()
	{
		return $this->type;
	}

	/**
	 * Get the [rank] column value.
	 * 
	 * @return     int
	 */
	public function getRank()
	{
		return $this->rank;
	}

	/**
	 * Get the [firm_name] column value.
	 * 
	 * @return     string
	 */
	public function getFirmName()
	{
		return $this->firm_name;
	}

	/**
	 * Get the [firm_type] column value.
	 * 
	 * @return     string
	 */
	public function getFirmType()
	{
		return $this->firm_type;
	}

	/**
	 * Get the [website_name] column value.
	 * 
	 * @return     string
	 */
	public function getWebsiteName()
	{
		return $this->website_name;
	}

	/**
	 * Get the [primary_domain_id] column value.
	 * 
	 * @return     string
	 */
	public function getPrimaryDomainId()
	{
		return $this->primary_domain_id;
	}

	/**
	 * Get the [email] column value.
	 * 
	 * @return     string
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * Get the [address] column value.
	 * 
	 * @return     string
	 */
	public function getAddress()
	{
		return $this->address;
	}

	/**
	 * Get the [city] column value.
	 * 
	 * @return     string
	 */
	public function getCity()
	{
		return $this->city;
	}

	/**
	 * Get the [state] column value.
	 * 
	 * @return     string
	 */
	public function getState()
	{
		return $this->state;
	}

	/**
	 * Get the [zip] column value.
	 * 
	 * @return     string
	 */
	public function getZip()
	{
		return $this->zip;
	}

	/**
	 * Get the [phone] column value.
	 * 
	 * @return     string
	 */
	public function getPhone()
	{
		return $this->phone;
	}

	/**
	 * Get the [fax] column value.
	 * 
	 * @return     string
	 */
	public function getFax()
	{
		return $this->fax;
	}

	/**
	 * Get the [template_id] column value.
	 * 
	 * @return     string
	 */
	public function getTemplateId()
	{
		return $this->template_id;
	}

	/**
	 * Get the [website_attribute_id] column value.
	 * 
	 * @return     string
	 */
	public function getWebsiteAttributeId()
	{
		return $this->website_attribute_id;
	}

	/**
	 * Get the [status] column value.
	 * 
	 * @return     int
	 */
	public function getStatus()
	{
		return $this->status;
	}

	/**
	 * Get the [path] column value.
	 * 
	 * @return     string
	 */
	public function getPath()
	{
		return $this->path;
	}

	/**
	 * Get the [host_id] column value.
	 * 
	 * @return     string
	 */
	public function getHostId()
	{
		return $this->host_id;
	}

	/**
	 * Get the [analytics_code] column value.
	 * 
	 * @return     string
	 */
	public function getAnalyticsCode()
	{
		return $this->analytics_code;
	}

	/**
	 * Get the [payment_account_id] column value.
	 * 
	 * @return     string
	 */
	public function getPaymentAccountId()
	{
		return $this->payment_account_id;
	}

	/**
	 * Get the [meta_description] column value.
	 * 
	 * @return     string
	 */
	public function getMetaDescription()
	{
		return $this->meta_description;
	}

	/**
	 * Get the [meta_keywords] column value.
	 * 
	 * @return     string
	 */
	public function getMetaKeywords()
	{
		return $this->meta_keywords;
	}

	/**
	 * Get the [social_media] column value.
	 * 
	 * @return     string
	 */
	public function getSocialMedia()
	{
		return $this->social_media;
	}

	/**
	 * Get the [optionally formatted] temporal [last_payment_update] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getLastPaymentUpdate($format = 'Y-m-d H:i:s')
	{
		if ($this->last_payment_update === null) {
			return null;
		}


		if ($this->last_payment_update === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->last_payment_update);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->last_payment_update, true), $x);
			}
		}

		if ($format === null) {
			// Because propel.useDateTimeClass is TRUE, we return a DateTime object.
			return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	/**
	 * Get the [optionally formatted] temporal [last_billing_date] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getLastBillingDate($format = 'Y-m-d')
	{
		if ($this->last_billing_date === null) {
			return null;
		}


		if ($this->last_billing_date === '0000-00-00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->last_billing_date);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->last_billing_date, true), $x);
			}
		}

		if ($format === null) {
			// Because propel.useDateTimeClass is TRUE, we return a DateTime object.
			return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	/**
	 * Get the [optionally formatted] temporal [cancelled_at] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getCancelledAt($format = 'Y-m-d H:i:s')
	{
		if ($this->cancelled_at === null) {
			return null;
		}


		if ($this->cancelled_at === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->cancelled_at);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->cancelled_at, true), $x);
			}
		}

		if ($format === null) {
			// Because propel.useDateTimeClass is TRUE, we return a DateTime object.
			return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	/**
	 * Get the [optionally formatted] temporal [created_at] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getCreatedAt($format = 'Y-m-d H:i:s')
	{
		if ($this->created_at === null) {
			return null;
		}


		if ($this->created_at === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->created_at);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->created_at, true), $x);
			}
		}

		if ($format === null) {
			// Because propel.useDateTimeClass is TRUE, we return a DateTime object.
			return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	/**
	 * Get the [optionally formatted] temporal [updated_at] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getUpdatedAt($format = 'Y-m-d H:i:s')
	{
		if ($this->updated_at === null) {
			return null;
		}


		if ($this->updated_at === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->updated_at);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->updated_at, true), $x);
			}
		}

		if ($format === null) {
			// Because propel.useDateTimeClass is TRUE, we return a DateTime object.
			return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      string $v new value
	 * @return     Website The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = WebsitePeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [cg_id] column.
	 * 
	 * @param      string $v new value
	 * @return     Website The current object (for fluent API support)
	 */
	public function setCgId($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->cg_id !== $v) {
			$this->cg_id = $v;
			$this->modifiedColumns[] = WebsitePeer::CG_ID;
		}

		return $this;
	} // setCgId()

	/**
	 * Set the value of [cim_customer_profile_id] column.
	 * 
	 * @param      string $v new value
	 * @return     Website The current object (for fluent API support)
	 */
	public function setCimCustomerProfileId($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->cim_customer_profile_id !== $v) {
			$this->cim_customer_profile_id = $v;
			$this->modifiedColumns[] = WebsitePeer::CIM_CUSTOMER_PROFILE_ID;
		}

		return $this;
	} // setCimCustomerProfileId()

	/**
	 * Set the value of [cim_payment_profile_id] column.
	 * 
	 * @param      string $v new value
	 * @return     Website The current object (for fluent API support)
	 */
	public function setCimPaymentProfileId($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->cim_payment_profile_id !== $v) {
			$this->cim_payment_profile_id = $v;
			$this->modifiedColumns[] = WebsitePeer::CIM_PAYMENT_PROFILE_ID;
		}

		return $this;
	} // setCimPaymentProfileId()

	/**
	 * Set the value of [customer_id] column.
	 * 
	 * @param      string $v new value
	 * @return     Website The current object (for fluent API support)
	 */
	public function setCustomerId($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->customer_id !== $v) {
			$this->customer_id = $v;
			$this->modifiedColumns[] = WebsitePeer::CUSTOMER_ID;
		}

		if ($this->aCustomer !== null && $this->aCustomer->getId() !== $v) {
			$this->aCustomer = null;
		}

		return $this;
	} // setCustomerId()

	/**
	 * Set the value of [type] column.
	 * 
	 * @param      int $v new value
	 * @return     Website The current object (for fluent API support)
	 */
	public function setType($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->type !== $v) {
			$this->type = $v;
			$this->modifiedColumns[] = WebsitePeer::TYPE;
		}

		return $this;
	} // setType()

	/**
	 * Set the value of [rank] column.
	 * 
	 * @param      int $v new value
	 * @return     Website The current object (for fluent API support)
	 */
	public function setRank($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->rank !== $v) {
			$this->rank = $v;
			$this->modifiedColumns[] = WebsitePeer::RANK;
		}

		return $this;
	} // setRank()

	/**
	 * Set the value of [firm_name] column.
	 * 
	 * @param      string $v new value
	 * @return     Website The current object (for fluent API support)
	 */
	public function setFirmName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->firm_name !== $v) {
			$this->firm_name = $v;
			$this->modifiedColumns[] = WebsitePeer::FIRM_NAME;
		}

		return $this;
	} // setFirmName()

	/**
	 * Set the value of [firm_type] column.
	 * 
	 * @param      string $v new value
	 * @return     Website The current object (for fluent API support)
	 */
	public function setFirmType($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->firm_type !== $v) {
			$this->firm_type = $v;
			$this->modifiedColumns[] = WebsitePeer::FIRM_TYPE;
		}

		return $this;
	} // setFirmType()

	/**
	 * Set the value of [website_name] column.
	 * 
	 * @param      string $v new value
	 * @return     Website The current object (for fluent API support)
	 */
	public function setWebsiteName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->website_name !== $v) {
			$this->website_name = $v;
			$this->modifiedColumns[] = WebsitePeer::WEBSITE_NAME;
		}

		return $this;
	} // setWebsiteName()

	/**
	 * Set the value of [primary_domain_id] column.
	 * 
	 * @param      string $v new value
	 * @return     Website The current object (for fluent API support)
	 */
	public function setPrimaryDomainId($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->primary_domain_id !== $v) {
			$this->primary_domain_id = $v;
			$this->modifiedColumns[] = WebsitePeer::PRIMARY_DOMAIN_ID;
		}

		if ($this->aPrimaryDomain !== null && $this->aPrimaryDomain->getId() !== $v) {
			$this->aPrimaryDomain = null;
		}

		return $this;
	} // setPrimaryDomainId()

	/**
	 * Set the value of [email] column.
	 * 
	 * @param      string $v new value
	 * @return     Website The current object (for fluent API support)
	 */
	public function setEmail($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = WebsitePeer::EMAIL;
		}

		return $this;
	} // setEmail()

	/**
	 * Set the value of [address] column.
	 * 
	 * @param      string $v new value
	 * @return     Website The current object (for fluent API support)
	 */
	public function setAddress($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->address !== $v) {
			$this->address = $v;
			$this->modifiedColumns[] = WebsitePeer::ADDRESS;
		}

		return $this;
	} // setAddress()

	/**
	 * Set the value of [city] column.
	 * 
	 * @param      string $v new value
	 * @return     Website The current object (for fluent API support)
	 */
	public function setCity($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->city !== $v) {
			$this->city = $v;
			$this->modifiedColumns[] = WebsitePeer::CITY;
		}

		return $this;
	} // setCity()

	/**
	 * Set the value of [state] column.
	 * 
	 * @param      string $v new value
	 * @return     Website The current object (for fluent API support)
	 */
	public function setState($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->state !== $v) {
			$this->state = $v;
			$this->modifiedColumns[] = WebsitePeer::STATE;
		}

		return $this;
	} // setState()

	/**
	 * Set the value of [zip] column.
	 * 
	 * @param      string $v new value
	 * @return     Website The current object (for fluent API support)
	 */
	public function setZip($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->zip !== $v) {
			$this->zip = $v;
			$this->modifiedColumns[] = WebsitePeer::ZIP;
		}

		return $this;
	} // setZip()

	/**
	 * Set the value of [phone] column.
	 * 
	 * @param      string $v new value
	 * @return     Website The current object (for fluent API support)
	 */
	public function setPhone($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->phone !== $v) {
			$this->phone = $v;
			$this->modifiedColumns[] = WebsitePeer::PHONE;
		}

		return $this;
	} // setPhone()

	/**
	 * Set the value of [fax] column.
	 * 
	 * @param      string $v new value
	 * @return     Website The current object (for fluent API support)
	 */
	public function setFax($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->fax !== $v) {
			$this->fax = $v;
			$this->modifiedColumns[] = WebsitePeer::FAX;
		}

		return $this;
	} // setFax()

	/**
	 * Set the value of [template_id] column.
	 * 
	 * @param      string $v new value
	 * @return     Website The current object (for fluent API support)
	 */
	public function setTemplateId($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->template_id !== $v) {
			$this->template_id = $v;
			$this->modifiedColumns[] = WebsitePeer::TEMPLATE_ID;
		}

		if ($this->aWebsiteTemplate !== null && $this->aWebsiteTemplate->getId() !== $v) {
			$this->aWebsiteTemplate = null;
		}

		return $this;
	} // setTemplateId()

	/**
	 * Set the value of [website_attribute_id] column.
	 * 
	 * @param      string $v new value
	 * @return     Website The current object (for fluent API support)
	 */
	public function setWebsiteAttributeId($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->website_attribute_id !== $v) {
			$this->website_attribute_id = $v;
			$this->modifiedColumns[] = WebsitePeer::WEBSITE_ATTRIBUTE_ID;
		}

		if ($this->aWebsiteAttribute !== null && $this->aWebsiteAttribute->getId() !== $v) {
			$this->aWebsiteAttribute = null;
		}

		return $this;
	} // setWebsiteAttributeId()

	/**
	 * Set the value of [status] column.
	 * 
	 * @param      int $v new value
	 * @return     Website The current object (for fluent API support)
	 */
	public function setStatus($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns[] = WebsitePeer::STATUS;
		}

		return $this;
	} // setStatus()

	/**
	 * Set the value of [path] column.
	 * 
	 * @param      string $v new value
	 * @return     Website The current object (for fluent API support)
	 */
	public function setPath($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->path !== $v) {
			$this->path = $v;
			$this->modifiedColumns[] = WebsitePeer::PATH;
		}

		return $this;
	} // setPath()

	/**
	 * Set the value of [host_id] column.
	 * 
	 * @param      string $v new value
	 * @return     Website The current object (for fluent API support)
	 */
	public function setHostId($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->host_id !== $v) {
			$this->host_id = $v;
			$this->modifiedColumns[] = WebsitePeer::HOST_ID;
		}

		if ($this->aHost !== null && $this->aHost->getId() !== $v) {
			$this->aHost = null;
		}

		return $this;
	} // setHostId()

	/**
	 * Set the value of [analytics_code] column.
	 * 
	 * @param      string $v new value
	 * @return     Website The current object (for fluent API support)
	 */
	public function setAnalyticsCode($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->analytics_code !== $v) {
			$this->analytics_code = $v;
			$this->modifiedColumns[] = WebsitePeer::ANALYTICS_CODE;
		}

		return $this;
	} // setAnalyticsCode()

	/**
	 * Set the value of [payment_account_id] column.
	 * 
	 * @param      string $v new value
	 * @return     Website The current object (for fluent API support)
	 */
	public function setPaymentAccountId($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->payment_account_id !== $v) {
			$this->payment_account_id = $v;
			$this->modifiedColumns[] = WebsitePeer::PAYMENT_ACCOUNT_ID;
		}

		return $this;
	} // setPaymentAccountId()

	/**
	 * Set the value of [meta_description] column.
	 * 
	 * @param      string $v new value
	 * @return     Website The current object (for fluent API support)
	 */
	public function setMetaDescription($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->meta_description !== $v) {
			$this->meta_description = $v;
			$this->modifiedColumns[] = WebsitePeer::META_DESCRIPTION;
		}

		return $this;
	} // setMetaDescription()

	/**
	 * Set the value of [meta_keywords] column.
	 * 
	 * @param      string $v new value
	 * @return     Website The current object (for fluent API support)
	 */
	public function setMetaKeywords($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->meta_keywords !== $v) {
			$this->meta_keywords = $v;
			$this->modifiedColumns[] = WebsitePeer::META_KEYWORDS;
		}

		return $this;
	} // setMetaKeywords()

	/**
	 * Set the value of [social_media] column.
	 * 
	 * @param      string $v new value
	 * @return     Website The current object (for fluent API support)
	 */
	public function setSocialMedia($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->social_media !== $v) {
			$this->social_media = $v;
			$this->modifiedColumns[] = WebsitePeer::SOCIAL_MEDIA;
		}

		return $this;
	} // setSocialMedia()

	/**
	 * Sets the value of [last_payment_update] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Website The current object (for fluent API support)
	 */
	public function setLastPaymentUpdate($v)
	{
		// we treat '' as NULL for temporal objects because DateTime('') == DateTime('now')
		// -- which is unexpected, to say the least.
		if ($v === null || $v === '') {
			$dt = null;
		} elseif ($v instanceof DateTime) {
			$dt = $v;
		} else {
			// some string/numeric value passed; we normalize that so that we can
			// validate it.
			try {
				if (is_numeric($v)) { // if it's a unix timestamp
					$dt = new DateTime('@'.$v, new DateTimeZone('UTC'));
					// We have to explicitly specify and then change the time zone because of a
					// DateTime bug: http://bugs.php.net/bug.php?id=43003
					$dt->setTimeZone(new DateTimeZone(date_default_timezone_get()));
				} else {
					$dt = new DateTime($v);
				}
			} catch (Exception $x) {
				throw new PropelException('Error parsing date/time value: ' . var_export($v, true), $x);
			}
		}

		if ( $this->last_payment_update !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->last_payment_update !== null && $tmpDt = new DateTime($this->last_payment_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->last_payment_update = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = WebsitePeer::LAST_PAYMENT_UPDATE;
			}
		} // if either are not null

		return $this;
	} // setLastPaymentUpdate()

	/**
	 * Sets the value of [last_billing_date] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Website The current object (for fluent API support)
	 */
	public function setLastBillingDate($v)
	{
		// we treat '' as NULL for temporal objects because DateTime('') == DateTime('now')
		// -- which is unexpected, to say the least.
		if ($v === null || $v === '') {
			$dt = null;
		} elseif ($v instanceof DateTime) {
			$dt = $v;
		} else {
			// some string/numeric value passed; we normalize that so that we can
			// validate it.
			try {
				if (is_numeric($v)) { // if it's a unix timestamp
					$dt = new DateTime('@'.$v, new DateTimeZone('UTC'));
					// We have to explicitly specify and then change the time zone because of a
					// DateTime bug: http://bugs.php.net/bug.php?id=43003
					$dt->setTimeZone(new DateTimeZone(date_default_timezone_get()));
				} else {
					$dt = new DateTime($v);
				}
			} catch (Exception $x) {
				throw new PropelException('Error parsing date/time value: ' . var_export($v, true), $x);
			}
		}

		if ( $this->last_billing_date !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->last_billing_date !== null && $tmpDt = new DateTime($this->last_billing_date)) ? $tmpDt->format('Y-m-d') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->last_billing_date = ($dt ? $dt->format('Y-m-d') : null);
				$this->modifiedColumns[] = WebsitePeer::LAST_BILLING_DATE;
			}
		} // if either are not null

		return $this;
	} // setLastBillingDate()

	/**
	 * Sets the value of [cancelled_at] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Website The current object (for fluent API support)
	 */
	public function setCancelledAt($v)
	{
		// we treat '' as NULL for temporal objects because DateTime('') == DateTime('now')
		// -- which is unexpected, to say the least.
		if ($v === null || $v === '') {
			$dt = null;
		} elseif ($v instanceof DateTime) {
			$dt = $v;
		} else {
			// some string/numeric value passed; we normalize that so that we can
			// validate it.
			try {
				if (is_numeric($v)) { // if it's a unix timestamp
					$dt = new DateTime('@'.$v, new DateTimeZone('UTC'));
					// We have to explicitly specify and then change the time zone because of a
					// DateTime bug: http://bugs.php.net/bug.php?id=43003
					$dt->setTimeZone(new DateTimeZone(date_default_timezone_get()));
				} else {
					$dt = new DateTime($v);
				}
			} catch (Exception $x) {
				throw new PropelException('Error parsing date/time value: ' . var_export($v, true), $x);
			}
		}

		if ( $this->cancelled_at !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->cancelled_at !== null && $tmpDt = new DateTime($this->cancelled_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->cancelled_at = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = WebsitePeer::CANCELLED_AT;
			}
		} // if either are not null

		return $this;
	} // setCancelledAt()

	/**
	 * Sets the value of [created_at] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Website The current object (for fluent API support)
	 */
	public function setCreatedAt($v)
	{
		// we treat '' as NULL for temporal objects because DateTime('') == DateTime('now')
		// -- which is unexpected, to say the least.
		if ($v === null || $v === '') {
			$dt = null;
		} elseif ($v instanceof DateTime) {
			$dt = $v;
		} else {
			// some string/numeric value passed; we normalize that so that we can
			// validate it.
			try {
				if (is_numeric($v)) { // if it's a unix timestamp
					$dt = new DateTime('@'.$v, new DateTimeZone('UTC'));
					// We have to explicitly specify and then change the time zone because of a
					// DateTime bug: http://bugs.php.net/bug.php?id=43003
					$dt->setTimeZone(new DateTimeZone(date_default_timezone_get()));
				} else {
					$dt = new DateTime($v);
				}
			} catch (Exception $x) {
				throw new PropelException('Error parsing date/time value: ' . var_export($v, true), $x);
			}
		}

		if ( $this->created_at !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->created_at = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = WebsitePeer::CREATED_AT;
			}
		} // if either are not null

		return $this;
	} // setCreatedAt()

	/**
	 * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Website The current object (for fluent API support)
	 */
	public function setUpdatedAt($v)
	{
		// we treat '' as NULL for temporal objects because DateTime('') == DateTime('now')
		// -- which is unexpected, to say the least.
		if ($v === null || $v === '') {
			$dt = null;
		} elseif ($v instanceof DateTime) {
			$dt = $v;
		} else {
			// some string/numeric value passed; we normalize that so that we can
			// validate it.
			try {
				if (is_numeric($v)) { // if it's a unix timestamp
					$dt = new DateTime('@'.$v, new DateTimeZone('UTC'));
					// We have to explicitly specify and then change the time zone because of a
					// DateTime bug: http://bugs.php.net/bug.php?id=43003
					$dt->setTimeZone(new DateTimeZone(date_default_timezone_get()));
				} else {
					$dt = new DateTime($v);
				}
			} catch (Exception $x) {
				throw new PropelException('Error parsing date/time value: ' . var_export($v, true), $x);
			}
		}

		if ( $this->updated_at !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->updated_at !== null && $tmpDt = new DateTime($this->updated_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->updated_at = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = WebsitePeer::UPDATED_AT;
			}
		} // if either are not null

		return $this;
	} // setUpdatedAt()

	/**
	 * Indicates whether the columns in this object are only set to default values.
	 *
	 * This method can be used in conjunction with isModified() to indicate whether an object is both
	 * modified _and_ has some values set which are non-default.
	 *
	 * @return     boolean Whether the columns in this object are only been set with default values.
	 */
	public function hasOnlyDefaultValues()
	{
		// otherwise, everything was equal, so return TRUE
		return true;
	} // hasOnlyDefaultValues()

	/**
	 * Hydrates (populates) the object variables with values from the database resultset.
	 *
	 * An offset (0-based "start column") is specified so that objects can be hydrated
	 * with a subset of the columns in the resultset rows.  This is needed, for example,
	 * for results of JOIN queries where the resultset row includes columns from two or
	 * more tables.
	 *
	 * @param      array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
	 * @param      int $startcol 0-based offset column which indicates which restultset column to start with.
	 * @param      boolean $rehydrate Whether this object is being re-hydrated from the database.
	 * @return     int next starting column
	 * @throws     PropelException  - Any caught Exception will be rewrapped as a PropelException.
	 */
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
			$this->cg_id = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->cim_customer_profile_id = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->cim_payment_profile_id = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->customer_id = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->type = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->rank = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
			$this->firm_name = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->firm_type = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->website_name = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->primary_domain_id = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->email = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
			$this->address = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
			$this->city = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
			$this->state = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
			$this->zip = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
			$this->phone = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
			$this->fax = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
			$this->template_id = ($row[$startcol + 18] !== null) ? (string) $row[$startcol + 18] : null;
			$this->website_attribute_id = ($row[$startcol + 19] !== null) ? (string) $row[$startcol + 19] : null;
			$this->status = ($row[$startcol + 20] !== null) ? (int) $row[$startcol + 20] : null;
			$this->path = ($row[$startcol + 21] !== null) ? (string) $row[$startcol + 21] : null;
			$this->host_id = ($row[$startcol + 22] !== null) ? (string) $row[$startcol + 22] : null;
			$this->analytics_code = ($row[$startcol + 23] !== null) ? (string) $row[$startcol + 23] : null;
			$this->payment_account_id = ($row[$startcol + 24] !== null) ? (string) $row[$startcol + 24] : null;
			$this->meta_description = ($row[$startcol + 25] !== null) ? (string) $row[$startcol + 25] : null;
			$this->meta_keywords = ($row[$startcol + 26] !== null) ? (string) $row[$startcol + 26] : null;
			$this->social_media = ($row[$startcol + 27] !== null) ? (string) $row[$startcol + 27] : null;
			$this->last_payment_update = ($row[$startcol + 28] !== null) ? (string) $row[$startcol + 28] : null;
			$this->last_billing_date = ($row[$startcol + 29] !== null) ? (string) $row[$startcol + 29] : null;
			$this->cancelled_at = ($row[$startcol + 30] !== null) ? (string) $row[$startcol + 30] : null;
			$this->created_at = ($row[$startcol + 31] !== null) ? (string) $row[$startcol + 31] : null;
			$this->updated_at = ($row[$startcol + 32] !== null) ? (string) $row[$startcol + 32] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 33; // 33 = WebsitePeer::NUM_COLUMNS - WebsitePeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Website object", $e);
		}
	}

	/**
	 * Checks and repairs the internal consistency of the object.
	 *
	 * This method is executed after an already-instantiated object is re-hydrated
	 * from the database.  It exists to check any foreign keys to make sure that
	 * the objects related to the current object are correct based on foreign key.
	 *
	 * You can override this method in the stub class, but you should always invoke
	 * the base method from the overridden method (i.e. parent::ensureConsistency()),
	 * in case your model changes.
	 *
	 * @throws     PropelException
	 */
	public function ensureConsistency()
	{

		if ($this->aCustomer !== null && $this->customer_id !== $this->aCustomer->getId()) {
			$this->aCustomer = null;
		}
		if ($this->aPrimaryDomain !== null && $this->primary_domain_id !== $this->aPrimaryDomain->getId()) {
			$this->aPrimaryDomain = null;
		}
		if ($this->aWebsiteTemplate !== null && $this->template_id !== $this->aWebsiteTemplate->getId()) {
			$this->aWebsiteTemplate = null;
		}
		if ($this->aWebsiteAttribute !== null && $this->website_attribute_id !== $this->aWebsiteAttribute->getId()) {
			$this->aWebsiteAttribute = null;
		}
		if ($this->aHost !== null && $this->host_id !== $this->aHost->getId()) {
			$this->aHost = null;
		}
	} // ensureConsistency

	/**
	 * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
	 *
	 * This will only work if the object has been saved and has a valid primary key set.
	 *
	 * @param      boolean $deep (optional) Whether to also de-associated any related objects.
	 * @param      PropelPDO $con (optional) The PropelPDO connection to use.
	 * @return     void
	 * @throws     PropelException - if this object is deleted, unsaved or doesn't have pk match in db
	 */
	public function reload($deep = false, PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("Cannot reload a deleted object.");
		}

		if ($this->isNew()) {
			throw new PropelException("Cannot reload an unsaved object.");
		}

		if ($con === null) {
			$con = Propel::getConnection(WebsitePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = WebsitePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aCustomer = null;
			$this->aPrimaryDomain = null;
			$this->aWebsiteTemplate = null;
			$this->aWebsiteAttribute = null;
			$this->aHost = null;
			$this->collCheddarGetterNotifications = null;

			$this->collDomains = null;

			$this->collCouponUsages = null;

			$this->collEmailAccounts = null;

			$this->collPages = null;

			$this->collClientMessages = null;

			$this->collTemplateCustomizations = null;

			$this->collCoupons = null;
		} // if (deep)
	}

	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @param      PropelPDO $con
	 * @return     void
	 * @throws     PropelException
	 * @see        BaseObject::setDeleted()
	 * @see        BaseObject::isDeleted()
	 */
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(WebsitePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			// sortable behavior
			
			WebsitePeer::shiftRank(-1, $this->getRank() + 1, null, $this->getCustomerId(), $con);
			WebsitePeer::clearInstancePool();

			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseWebsite:delete:pre') as $callable)
			{
			  if (call_user_func($callable, $this, $con))
			  {
			    $con->commit();
			    return;
			  }
			}

			if ($ret) {
				WebsiteQuery::create()
					->filterByPrimaryKey($this->getPrimaryKey())
					->delete($con);
				$this->postDelete($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BaseWebsite:delete:post') as $callable)
				{
				  call_user_func($callable, $this, $con);
				}

				$con->commit();
				$this->setDeleted(true);
			} else {
				$con->commit();
			}
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Persists this object to the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All modified related objects will also be persisted in the doSave()
	 * method.  This method wraps all precipitate database operations in a
	 * single transaction.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        doSave()
	 */
	public function save(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(WebsitePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			// sortable behavior
			$this->processSortableQueries($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseWebsite:save:pre') as $callable)
			{
			  if (is_integer($affectedRows = call_user_func($callable, $this, $con)))
			  {
			  	$con->commit();
			    return $affectedRows;
			  }
			}

			if ($isInsert) {
				$ret = $ret && $this->preInsert($con);
				// sortable behavior
				if (!$this->isColumnModified(WebsitePeer::RANK_COL)) {
					$this->setRank(WebsiteQuery::create()->getMaxRank($this->getCustomerId(), $con) + 1);
				}

				// timestampable behavior
				if (!$this->isColumnModified(WebsitePeer::CREATED_AT)) {
					$this->setCreatedAt(time());
				}
				if (!$this->isColumnModified(WebsitePeer::UPDATED_AT)) {
					$this->setUpdatedAt(time());
				}
			} else {
				$ret = $ret && $this->preUpdate($con);
				// timestampable behavior
				if ($this->isModified() && !$this->isColumnModified(WebsitePeer::UPDATED_AT)) {
					$this->setUpdatedAt(time());
				}
			}
			if ($ret) {
				$affectedRows = $this->doSave($con);
				if ($isInsert) {
					$this->postInsert($con);
				} else {
					$this->postUpdate($con);
				}
				$this->postSave($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BaseWebsite:save:post') as $callable)
				{
				  call_user_func($callable, $this, $con, $affectedRows);
				}

				WebsitePeer::addInstanceToPool($this);
			} else {
				$affectedRows = 0;
			}
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs the work of inserting or updating the row in the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All related objects are also updated in this method.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        save()
	 */
	protected function doSave(PropelPDO $con)
	{
		$affectedRows = 0; // initialize var to track total num of affected rows
		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;

			// We call the save method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aCustomer !== null) {
				if ($this->aCustomer->isModified() || $this->aCustomer->isNew()) {
					$affectedRows += $this->aCustomer->save($con);
				}
				$this->setCustomer($this->aCustomer);
			}

			if ($this->aPrimaryDomain !== null) {
				if ($this->aPrimaryDomain->isModified() || $this->aPrimaryDomain->isNew()) {
					$affectedRows += $this->aPrimaryDomain->save($con);
				}
				$this->setPrimaryDomain($this->aPrimaryDomain);
			}

			if ($this->aWebsiteTemplate !== null) {
				if ($this->aWebsiteTemplate->isModified() || $this->aWebsiteTemplate->isNew()) {
					$affectedRows += $this->aWebsiteTemplate->save($con);
				}
				$this->setWebsiteTemplate($this->aWebsiteTemplate);
			}

			if ($this->aWebsiteAttribute !== null) {
				if ($this->aWebsiteAttribute->isModified() || $this->aWebsiteAttribute->isNew()) {
					$affectedRows += $this->aWebsiteAttribute->save($con);
				}
				$this->setWebsiteAttribute($this->aWebsiteAttribute);
			}

			if ($this->aHost !== null) {
				if ($this->aHost->isModified() || $this->aHost->isNew()) {
					$affectedRows += $this->aHost->save($con);
				}
				$this->setHost($this->aHost);
			}


			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows += 1;
					$this->setNew(false);
				} else {
					$affectedRows += WebsitePeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collCheddarGetterNotifications !== null) {
				foreach ($this->collCheddarGetterNotifications as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collDomains !== null) {
				foreach ($this->collDomains as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCouponUsages !== null) {
				foreach ($this->collCouponUsages as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collEmailAccounts !== null) {
				foreach ($this->collEmailAccounts as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collPages !== null) {
				foreach ($this->collPages as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collClientMessages !== null) {
				foreach ($this->collClientMessages as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collTemplateCustomizations !== null) {
				foreach ($this->collTemplateCustomizations as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			$this->alreadyInSave = false;

		}
		return $affectedRows;
	} // doSave()

	/**
	 * Array of ValidationFailed objects.
	 * @var        array ValidationFailed[]
	 */
	protected $validationFailures = array();

	/**
	 * Gets any ValidationFailed objects that resulted from last call to validate().
	 *
	 *
	 * @return     array ValidationFailed[]
	 * @see        validate()
	 */
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	/**
	 * Validates the objects modified field values and all objects related to this table.
	 *
	 * If $columns is either a column name or an array of column names
	 * only those columns are validated.
	 *
	 * @param      mixed $columns Column name or an array of column names.
	 * @return     boolean Whether all columns pass validation.
	 * @see        doValidate()
	 * @see        getValidationFailures()
	 */
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	/**
	 * This function performs the validation work for complex object models.
	 *
	 * In addition to checking the current object, all related objects will
	 * also be validated.  If all pass then <code>true</code> is returned; otherwise
	 * an aggreagated array of ValidationFailed objects will be returned.
	 *
	 * @param      array $columns Array of column names to validate.
	 * @return     mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
	 */
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			// We call the validate method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aCustomer !== null) {
				if (!$this->aCustomer->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCustomer->getValidationFailures());
				}
			}

			if ($this->aPrimaryDomain !== null) {
				if (!$this->aPrimaryDomain->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aPrimaryDomain->getValidationFailures());
				}
			}

			if ($this->aWebsiteTemplate !== null) {
				if (!$this->aWebsiteTemplate->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aWebsiteTemplate->getValidationFailures());
				}
			}

			if ($this->aWebsiteAttribute !== null) {
				if (!$this->aWebsiteAttribute->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aWebsiteAttribute->getValidationFailures());
				}
			}

			if ($this->aHost !== null) {
				if (!$this->aHost->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aHost->getValidationFailures());
				}
			}


			if (($retval = WebsitePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCheddarGetterNotifications !== null) {
					foreach ($this->collCheddarGetterNotifications as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collDomains !== null) {
					foreach ($this->collDomains as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCouponUsages !== null) {
					foreach ($this->collCouponUsages as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collEmailAccounts !== null) {
					foreach ($this->collEmailAccounts as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collPages !== null) {
					foreach ($this->collPages as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collClientMessages !== null) {
					foreach ($this->collClientMessages as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collTemplateCustomizations !== null) {
					foreach ($this->collTemplateCustomizations as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	/**
	 * Retrieves a field from the object by name passed in as a string.
	 *
	 * @param      string $name name
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     mixed Value of field.
	 */
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = WebsitePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	/**
	 * Retrieves a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @return     mixed Value of field at $pos
	 */
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getCgId();
				break;
			case 2:
				return $this->getCimCustomerProfileId();
				break;
			case 3:
				return $this->getCimPaymentProfileId();
				break;
			case 4:
				return $this->getCustomerId();
				break;
			case 5:
				return $this->getType();
				break;
			case 6:
				return $this->getRank();
				break;
			case 7:
				return $this->getFirmName();
				break;
			case 8:
				return $this->getFirmType();
				break;
			case 9:
				return $this->getWebsiteName();
				break;
			case 10:
				return $this->getPrimaryDomainId();
				break;
			case 11:
				return $this->getEmail();
				break;
			case 12:
				return $this->getAddress();
				break;
			case 13:
				return $this->getCity();
				break;
			case 14:
				return $this->getState();
				break;
			case 15:
				return $this->getZip();
				break;
			case 16:
				return $this->getPhone();
				break;
			case 17:
				return $this->getFax();
				break;
			case 18:
				return $this->getTemplateId();
				break;
			case 19:
				return $this->getWebsiteAttributeId();
				break;
			case 20:
				return $this->getStatus();
				break;
			case 21:
				return $this->getPath();
				break;
			case 22:
				return $this->getHostId();
				break;
			case 23:
				return $this->getAnalyticsCode();
				break;
			case 24:
				return $this->getPaymentAccountId();
				break;
			case 25:
				return $this->getMetaDescription();
				break;
			case 26:
				return $this->getMetaKeywords();
				break;
			case 27:
				return $this->getSocialMedia();
				break;
			case 28:
				return $this->getLastPaymentUpdate();
				break;
			case 29:
				return $this->getLastBillingDate();
				break;
			case 30:
				return $this->getCancelledAt();
				break;
			case 31:
				return $this->getCreatedAt();
				break;
			case 32:
				return $this->getUpdatedAt();
				break;
			default:
				return null;
				break;
		} // switch()
	}

	/**
	 * Exports the object as an array.
	 *
	 * You can specify the key type of the array by passing one of the class
	 * type constants.
	 *
	 * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 *                    Defaults to BasePeer::TYPE_PHPNAME.
	 * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
	 * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
	 *
	 * @return    array an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $includeForeignObjects = false)
	{
		$keys = WebsitePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getCgId(),
			$keys[2] => $this->getCimCustomerProfileId(),
			$keys[3] => $this->getCimPaymentProfileId(),
			$keys[4] => $this->getCustomerId(),
			$keys[5] => $this->getType(),
			$keys[6] => $this->getRank(),
			$keys[7] => $this->getFirmName(),
			$keys[8] => $this->getFirmType(),
			$keys[9] => $this->getWebsiteName(),
			$keys[10] => $this->getPrimaryDomainId(),
			$keys[11] => $this->getEmail(),
			$keys[12] => $this->getAddress(),
			$keys[13] => $this->getCity(),
			$keys[14] => $this->getState(),
			$keys[15] => $this->getZip(),
			$keys[16] => $this->getPhone(),
			$keys[17] => $this->getFax(),
			$keys[18] => $this->getTemplateId(),
			$keys[19] => $this->getWebsiteAttributeId(),
			$keys[20] => $this->getStatus(),
			$keys[21] => $this->getPath(),
			$keys[22] => $this->getHostId(),
			$keys[23] => $this->getAnalyticsCode(),
			$keys[24] => $this->getPaymentAccountId(),
			$keys[25] => $this->getMetaDescription(),
			$keys[26] => $this->getMetaKeywords(),
			$keys[27] => $this->getSocialMedia(),
			$keys[28] => $this->getLastPaymentUpdate(),
			$keys[29] => $this->getLastBillingDate(),
			$keys[30] => $this->getCancelledAt(),
			$keys[31] => $this->getCreatedAt(),
			$keys[32] => $this->getUpdatedAt(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aCustomer) {
				$result['Customer'] = $this->aCustomer->toArray($keyType, $includeLazyLoadColumns, true);
			}
			if (null !== $this->aPrimaryDomain) {
				$result['PrimaryDomain'] = $this->aPrimaryDomain->toArray($keyType, $includeLazyLoadColumns, true);
			}
			if (null !== $this->aWebsiteTemplate) {
				$result['WebsiteTemplate'] = $this->aWebsiteTemplate->toArray($keyType, $includeLazyLoadColumns, true);
			}
			if (null !== $this->aWebsiteAttribute) {
				$result['WebsiteAttribute'] = $this->aWebsiteAttribute->toArray($keyType, $includeLazyLoadColumns, true);
			}
			if (null !== $this->aHost) {
				$result['Host'] = $this->aHost->toArray($keyType, $includeLazyLoadColumns, true);
			}
		}
		return $result;
	}

	/**
	 * Sets a field from the object by name passed in as a string.
	 *
	 * @param      string $name peer name
	 * @param      mixed $value field value
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     void
	 */
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = WebsitePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	/**
	 * Sets a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @param      mixed $value field value
	 * @return     void
	 */
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setCgId($value);
				break;
			case 2:
				$this->setCimCustomerProfileId($value);
				break;
			case 3:
				$this->setCimPaymentProfileId($value);
				break;
			case 4:
				$this->setCustomerId($value);
				break;
			case 5:
				$this->setType($value);
				break;
			case 6:
				$this->setRank($value);
				break;
			case 7:
				$this->setFirmName($value);
				break;
			case 8:
				$this->setFirmType($value);
				break;
			case 9:
				$this->setWebsiteName($value);
				break;
			case 10:
				$this->setPrimaryDomainId($value);
				break;
			case 11:
				$this->setEmail($value);
				break;
			case 12:
				$this->setAddress($value);
				break;
			case 13:
				$this->setCity($value);
				break;
			case 14:
				$this->setState($value);
				break;
			case 15:
				$this->setZip($value);
				break;
			case 16:
				$this->setPhone($value);
				break;
			case 17:
				$this->setFax($value);
				break;
			case 18:
				$this->setTemplateId($value);
				break;
			case 19:
				$this->setWebsiteAttributeId($value);
				break;
			case 20:
				$this->setStatus($value);
				break;
			case 21:
				$this->setPath($value);
				break;
			case 22:
				$this->setHostId($value);
				break;
			case 23:
				$this->setAnalyticsCode($value);
				break;
			case 24:
				$this->setPaymentAccountId($value);
				break;
			case 25:
				$this->setMetaDescription($value);
				break;
			case 26:
				$this->setMetaKeywords($value);
				break;
			case 27:
				$this->setSocialMedia($value);
				break;
			case 28:
				$this->setLastPaymentUpdate($value);
				break;
			case 29:
				$this->setLastBillingDate($value);
				break;
			case 30:
				$this->setCancelledAt($value);
				break;
			case 31:
				$this->setCreatedAt($value);
				break;
			case 32:
				$this->setUpdatedAt($value);
				break;
		} // switch()
	}

	/**
	 * Populates the object using an array.
	 *
	 * This is particularly useful when populating an object from one of the
	 * request arrays (e.g. $_POST).  This method goes through the column
	 * names, checking to see whether a matching key exists in populated
	 * array. If so the setByName() method is called for that column.
	 *
	 * You can specify the key type of the array by additionally passing one
	 * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 * The default key type is the column's phpname (e.g. 'AuthorId')
	 *
	 * @param      array  $arr     An array to populate the object from.
	 * @param      string $keyType The type of keys the array uses.
	 * @return     void
	 */
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = WebsitePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCgId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCimCustomerProfileId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCimPaymentProfileId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCustomerId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setType($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setRank($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFirmName($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFirmType($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setWebsiteName($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setPrimaryDomainId($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setEmail($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setAddress($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setCity($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setState($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setZip($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setPhone($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setFax($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setTemplateId($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setWebsiteAttributeId($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setStatus($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setPath($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setHostId($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setAnalyticsCode($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setPaymentAccountId($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setMetaDescription($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setMetaKeywords($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setSocialMedia($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setLastPaymentUpdate($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setLastBillingDate($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setCancelledAt($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setCreatedAt($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setUpdatedAt($arr[$keys[32]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(WebsitePeer::DATABASE_NAME);

		if ($this->isColumnModified(WebsitePeer::ID)) $criteria->add(WebsitePeer::ID, $this->id);
		if ($this->isColumnModified(WebsitePeer::CG_ID)) $criteria->add(WebsitePeer::CG_ID, $this->cg_id);
		if ($this->isColumnModified(WebsitePeer::CIM_CUSTOMER_PROFILE_ID)) $criteria->add(WebsitePeer::CIM_CUSTOMER_PROFILE_ID, $this->cim_customer_profile_id);
		if ($this->isColumnModified(WebsitePeer::CIM_PAYMENT_PROFILE_ID)) $criteria->add(WebsitePeer::CIM_PAYMENT_PROFILE_ID, $this->cim_payment_profile_id);
		if ($this->isColumnModified(WebsitePeer::CUSTOMER_ID)) $criteria->add(WebsitePeer::CUSTOMER_ID, $this->customer_id);
		if ($this->isColumnModified(WebsitePeer::TYPE)) $criteria->add(WebsitePeer::TYPE, $this->type);
		if ($this->isColumnModified(WebsitePeer::RANK)) $criteria->add(WebsitePeer::RANK, $this->rank);
		if ($this->isColumnModified(WebsitePeer::FIRM_NAME)) $criteria->add(WebsitePeer::FIRM_NAME, $this->firm_name);
		if ($this->isColumnModified(WebsitePeer::FIRM_TYPE)) $criteria->add(WebsitePeer::FIRM_TYPE, $this->firm_type);
		if ($this->isColumnModified(WebsitePeer::WEBSITE_NAME)) $criteria->add(WebsitePeer::WEBSITE_NAME, $this->website_name);
		if ($this->isColumnModified(WebsitePeer::PRIMARY_DOMAIN_ID)) $criteria->add(WebsitePeer::PRIMARY_DOMAIN_ID, $this->primary_domain_id);
		if ($this->isColumnModified(WebsitePeer::EMAIL)) $criteria->add(WebsitePeer::EMAIL, $this->email);
		if ($this->isColumnModified(WebsitePeer::ADDRESS)) $criteria->add(WebsitePeer::ADDRESS, $this->address);
		if ($this->isColumnModified(WebsitePeer::CITY)) $criteria->add(WebsitePeer::CITY, $this->city);
		if ($this->isColumnModified(WebsitePeer::STATE)) $criteria->add(WebsitePeer::STATE, $this->state);
		if ($this->isColumnModified(WebsitePeer::ZIP)) $criteria->add(WebsitePeer::ZIP, $this->zip);
		if ($this->isColumnModified(WebsitePeer::PHONE)) $criteria->add(WebsitePeer::PHONE, $this->phone);
		if ($this->isColumnModified(WebsitePeer::FAX)) $criteria->add(WebsitePeer::FAX, $this->fax);
		if ($this->isColumnModified(WebsitePeer::TEMPLATE_ID)) $criteria->add(WebsitePeer::TEMPLATE_ID, $this->template_id);
		if ($this->isColumnModified(WebsitePeer::WEBSITE_ATTRIBUTE_ID)) $criteria->add(WebsitePeer::WEBSITE_ATTRIBUTE_ID, $this->website_attribute_id);
		if ($this->isColumnModified(WebsitePeer::STATUS)) $criteria->add(WebsitePeer::STATUS, $this->status);
		if ($this->isColumnModified(WebsitePeer::PATH)) $criteria->add(WebsitePeer::PATH, $this->path);
		if ($this->isColumnModified(WebsitePeer::HOST_ID)) $criteria->add(WebsitePeer::HOST_ID, $this->host_id);
		if ($this->isColumnModified(WebsitePeer::ANALYTICS_CODE)) $criteria->add(WebsitePeer::ANALYTICS_CODE, $this->analytics_code);
		if ($this->isColumnModified(WebsitePeer::PAYMENT_ACCOUNT_ID)) $criteria->add(WebsitePeer::PAYMENT_ACCOUNT_ID, $this->payment_account_id);
		if ($this->isColumnModified(WebsitePeer::META_DESCRIPTION)) $criteria->add(WebsitePeer::META_DESCRIPTION, $this->meta_description);
		if ($this->isColumnModified(WebsitePeer::META_KEYWORDS)) $criteria->add(WebsitePeer::META_KEYWORDS, $this->meta_keywords);
		if ($this->isColumnModified(WebsitePeer::SOCIAL_MEDIA)) $criteria->add(WebsitePeer::SOCIAL_MEDIA, $this->social_media);
		if ($this->isColumnModified(WebsitePeer::LAST_PAYMENT_UPDATE)) $criteria->add(WebsitePeer::LAST_PAYMENT_UPDATE, $this->last_payment_update);
		if ($this->isColumnModified(WebsitePeer::LAST_BILLING_DATE)) $criteria->add(WebsitePeer::LAST_BILLING_DATE, $this->last_billing_date);
		if ($this->isColumnModified(WebsitePeer::CANCELLED_AT)) $criteria->add(WebsitePeer::CANCELLED_AT, $this->cancelled_at);
		if ($this->isColumnModified(WebsitePeer::CREATED_AT)) $criteria->add(WebsitePeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(WebsitePeer::UPDATED_AT)) $criteria->add(WebsitePeer::UPDATED_AT, $this->updated_at);

		return $criteria;
	}

	/**
	 * Builds a Criteria object containing the primary key for this object.
	 *
	 * Unlike buildCriteria() this method includes the primary key values regardless
	 * of whether or not they have been modified.
	 *
	 * @return     Criteria The Criteria object containing value(s) for primary key(s).
	 */
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(WebsitePeer::DATABASE_NAME);
		$criteria->add(WebsitePeer::ID, $this->id);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     string
	 */
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	/**
	 * Generic method to set the primary key (id column).
	 *
	 * @param      string $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	/**
	 * Returns true if the primary key for this object is null.
	 * @return     boolean
	 */
	public function isPrimaryKeyNull()
	{
		return null === $this->getId();
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of Website (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{
		$copyObj->setId($this->id);
		$copyObj->setCgId($this->cg_id);
		$copyObj->setCimCustomerProfileId($this->cim_customer_profile_id);
		$copyObj->setCimPaymentProfileId($this->cim_payment_profile_id);
		$copyObj->setCustomerId($this->customer_id);
		$copyObj->setType($this->type);
		$copyObj->setRank($this->rank);
		$copyObj->setFirmName($this->firm_name);
		$copyObj->setFirmType($this->firm_type);
		$copyObj->setWebsiteName($this->website_name);
		$copyObj->setPrimaryDomainId($this->primary_domain_id);
		$copyObj->setEmail($this->email);
		$copyObj->setAddress($this->address);
		$copyObj->setCity($this->city);
		$copyObj->setState($this->state);
		$copyObj->setZip($this->zip);
		$copyObj->setPhone($this->phone);
		$copyObj->setFax($this->fax);
		$copyObj->setTemplateId($this->template_id);
		$copyObj->setWebsiteAttributeId($this->website_attribute_id);
		$copyObj->setStatus($this->status);
		$copyObj->setPath($this->path);
		$copyObj->setHostId($this->host_id);
		$copyObj->setAnalyticsCode($this->analytics_code);
		$copyObj->setPaymentAccountId($this->payment_account_id);
		$copyObj->setMetaDescription($this->meta_description);
		$copyObj->setMetaKeywords($this->meta_keywords);
		$copyObj->setSocialMedia($this->social_media);
		$copyObj->setLastPaymentUpdate($this->last_payment_update);
		$copyObj->setLastBillingDate($this->last_billing_date);
		$copyObj->setCancelledAt($this->cancelled_at);
		$copyObj->setCreatedAt($this->created_at);
		$copyObj->setUpdatedAt($this->updated_at);

		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getCheddarGetterNotifications() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addCheddarGetterNotification($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getDomains() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addDomain($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getCouponUsages() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addCouponUsage($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getEmailAccounts() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addEmailAccount($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getPages() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addPage($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getClientMessages() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addClientMessage($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getTemplateCustomizations() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addTemplateCustomization($relObj->copy($deepCopy));
				}
			}

		} // if ($deepCopy)


		$copyObj->setNew(true);
	}

	/**
	 * Makes a copy of this object that will be inserted as a new row in table when saved.
	 * It creates a new object filling in the simple attributes, but skipping any primary
	 * keys that are defined for the table.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @return     Website Clone of current object.
	 * @throws     PropelException
	 */
	public function copy($deepCopy = false)
	{
		// we use get_class(), because this might be a subclass
		$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	/**
	 * Returns a peer instance associated with this om.
	 *
	 * Since Peer classes are not to have any instance attributes, this method returns the
	 * same instance for all member of this class. The method could therefore
	 * be static, but this would prevent one from overriding the behavior.
	 *
	 * @return     WebsitePeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new WebsitePeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Customer object.
	 *
	 * @param      Customer $v
	 * @return     Website The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setCustomer(Customer $v = null)
	{
		if ($v === null) {
			$this->setCustomerId(NULL);
		} else {
			$this->setCustomerId($v->getId());
		}

		$this->aCustomer = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Customer object, it will not be re-added.
		if ($v !== null) {
			$v->addWebsite($this);
		}

		return $this;
	}


	/**
	 * Get the associated Customer object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Customer The associated Customer object.
	 * @throws     PropelException
	 */
	public function getCustomer(PropelPDO $con = null)
	{
		if ($this->aCustomer === null && (($this->customer_id !== "" && $this->customer_id !== null))) {
			$this->aCustomer = CustomerQuery::create()->findPk($this->customer_id, $con);
			/* The following can be used additionally to
				 guarantee the related object contains a reference
				 to this object.  This level of coupling may, however, be
				 undesirable since it could result in an only partially populated collection
				 in the referenced object.
				 $this->aCustomer->addWebsites($this);
			 */
		}
		return $this->aCustomer;
	}

	/**
	 * Declares an association between this object and a Domain object.
	 *
	 * @param      Domain $v
	 * @return     Website The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setPrimaryDomain(Domain $v = null)
	{
		if ($v === null) {
			$this->setPrimaryDomainId(NULL);
		} else {
			$this->setPrimaryDomainId($v->getId());
		}

		$this->aPrimaryDomain = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Domain object, it will not be re-added.
		if ($v !== null) {
			$v->addWebsiteRelatedByPrimaryDomainId($this);
		}

		return $this;
	}


	/**
	 * Get the associated Domain object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Domain The associated Domain object.
	 * @throws     PropelException
	 */
	public function getPrimaryDomain(PropelPDO $con = null)
	{
		if ($this->aPrimaryDomain === null && (($this->primary_domain_id !== "" && $this->primary_domain_id !== null))) {
			$this->aPrimaryDomain = DomainQuery::create()->findPk($this->primary_domain_id, $con);
			/* The following can be used additionally to
				 guarantee the related object contains a reference
				 to this object.  This level of coupling may, however, be
				 undesirable since it could result in an only partially populated collection
				 in the referenced object.
				 $this->aPrimaryDomain->addWebsitesRelatedByPrimaryDomainId($this);
			 */
		}
		return $this->aPrimaryDomain;
	}

	/**
	 * Declares an association between this object and a WebsiteTemplate object.
	 *
	 * @param      WebsiteTemplate $v
	 * @return     Website The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setWebsiteTemplate(WebsiteTemplate $v = null)
	{
		if ($v === null) {
			$this->setTemplateId(NULL);
		} else {
			$this->setTemplateId($v->getId());
		}

		$this->aWebsiteTemplate = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the WebsiteTemplate object, it will not be re-added.
		if ($v !== null) {
			$v->addWebsite($this);
		}

		return $this;
	}


	/**
	 * Get the associated WebsiteTemplate object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     WebsiteTemplate The associated WebsiteTemplate object.
	 * @throws     PropelException
	 */
	public function getWebsiteTemplate(PropelPDO $con = null)
	{
		if ($this->aWebsiteTemplate === null && (($this->template_id !== "" && $this->template_id !== null))) {
			$this->aWebsiteTemplate = WebsiteTemplateQuery::create()->findPk($this->template_id, $con);
			/* The following can be used additionally to
				 guarantee the related object contains a reference
				 to this object.  This level of coupling may, however, be
				 undesirable since it could result in an only partially populated collection
				 in the referenced object.
				 $this->aWebsiteTemplate->addWebsites($this);
			 */
		}
		return $this->aWebsiteTemplate;
	}

	/**
	 * Declares an association between this object and a WebsiteAttribute object.
	 *
	 * @param      WebsiteAttribute $v
	 * @return     Website The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setWebsiteAttribute(WebsiteAttribute $v = null)
	{
		if ($v === null) {
			$this->setWebsiteAttributeId(NULL);
		} else {
			$this->setWebsiteAttributeId($v->getId());
		}

		$this->aWebsiteAttribute = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the WebsiteAttribute object, it will not be re-added.
		if ($v !== null) {
			$v->addWebsite($this);
		}

		return $this;
	}


	/**
	 * Get the associated WebsiteAttribute object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     WebsiteAttribute The associated WebsiteAttribute object.
	 * @throws     PropelException
	 */
	public function getWebsiteAttribute(PropelPDO $con = null)
	{
		if ($this->aWebsiteAttribute === null && (($this->website_attribute_id !== "" && $this->website_attribute_id !== null))) {
			$this->aWebsiteAttribute = WebsiteAttributeQuery::create()->findPk($this->website_attribute_id, $con);
			/* The following can be used additionally to
				 guarantee the related object contains a reference
				 to this object.  This level of coupling may, however, be
				 undesirable since it could result in an only partially populated collection
				 in the referenced object.
				 $this->aWebsiteAttribute->addWebsites($this);
			 */
		}
		return $this->aWebsiteAttribute;
	}

	/**
	 * Declares an association between this object and a Host object.
	 *
	 * @param      Host $v
	 * @return     Website The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setHost(Host $v = null)
	{
		if ($v === null) {
			$this->setHostId(NULL);
		} else {
			$this->setHostId($v->getId());
		}

		$this->aHost = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Host object, it will not be re-added.
		if ($v !== null) {
			$v->addWebsite($this);
		}

		return $this;
	}


	/**
	 * Get the associated Host object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Host The associated Host object.
	 * @throws     PropelException
	 */
	public function getHost(PropelPDO $con = null)
	{
		if ($this->aHost === null && (($this->host_id !== "" && $this->host_id !== null))) {
			$this->aHost = HostQuery::create()->findPk($this->host_id, $con);
			/* The following can be used additionally to
				 guarantee the related object contains a reference
				 to this object.  This level of coupling may, however, be
				 undesirable since it could result in an only partially populated collection
				 in the referenced object.
				 $this->aHost->addWebsites($this);
			 */
		}
		return $this->aHost;
	}

	/**
	 * Clears out the collCheddarGetterNotifications collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addCheddarGetterNotifications()
	 */
	public function clearCheddarGetterNotifications()
	{
		$this->collCheddarGetterNotifications = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collCheddarGetterNotifications collection.
	 *
	 * By default this just sets the collCheddarGetterNotifications collection to an empty array (like clearcollCheddarGetterNotifications());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initCheddarGetterNotifications()
	{
		$this->collCheddarGetterNotifications = new PropelObjectCollection();
		$this->collCheddarGetterNotifications->setModel('CheddarGetterNotification');
	}

	/**
	 * Gets an array of CheddarGetterNotification objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Website is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array CheddarGetterNotification[] List of CheddarGetterNotification objects
	 * @throws     PropelException
	 */
	public function getCheddarGetterNotifications($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collCheddarGetterNotifications || null !== $criteria) {
			if ($this->isNew() && null === $this->collCheddarGetterNotifications) {
				// return empty collection
				$this->initCheddarGetterNotifications();
			} else {
				$collCheddarGetterNotifications = CheddarGetterNotificationQuery::create(null, $criteria)
					->filterByWebsite($this)
					->find($con);
				if (null !== $criteria) {
					return $collCheddarGetterNotifications;
				}
				$this->collCheddarGetterNotifications = $collCheddarGetterNotifications;
			}
		}
		return $this->collCheddarGetterNotifications;
	}

	/**
	 * Returns the number of related CheddarGetterNotification objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related CheddarGetterNotification objects.
	 * @throws     PropelException
	 */
	public function countCheddarGetterNotifications(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collCheddarGetterNotifications || null !== $criteria) {
			if ($this->isNew() && null === $this->collCheddarGetterNotifications) {
				return 0;
			} else {
				$query = CheddarGetterNotificationQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByWebsite($this)
					->count($con);
			}
		} else {
			return count($this->collCheddarGetterNotifications);
		}
	}

	/**
	 * Method called to associate a CheddarGetterNotification object to this object
	 * through the CheddarGetterNotification foreign key attribute.
	 *
	 * @param      CheddarGetterNotification $l CheddarGetterNotification
	 * @return     void
	 * @throws     PropelException
	 */
	public function addCheddarGetterNotification(CheddarGetterNotification $l)
	{
		if ($this->collCheddarGetterNotifications === null) {
			$this->initCheddarGetterNotifications();
		}
		if (!$this->collCheddarGetterNotifications->contains($l)) { // only add it if the **same** object is not already associated
			$this->collCheddarGetterNotifications[]= $l;
			$l->setWebsite($this);
		}
	}

	/**
	 * Clears out the collDomains collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addDomains()
	 */
	public function clearDomains()
	{
		$this->collDomains = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collDomains collection.
	 *
	 * By default this just sets the collDomains collection to an empty array (like clearcollDomains());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initDomains()
	{
		$this->collDomains = new PropelObjectCollection();
		$this->collDomains->setModel('Domain');
	}

	/**
	 * Gets an array of Domain objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Website is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Domain[] List of Domain objects
	 * @throws     PropelException
	 */
	public function getDomains($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collDomains || null !== $criteria) {
			if ($this->isNew() && null === $this->collDomains) {
				// return empty collection
				$this->initDomains();
			} else {
				$collDomains = DomainQuery::create(null, $criteria)
					->filterByWebsite($this)
					->find($con);
				if (null !== $criteria) {
					return $collDomains;
				}
				$this->collDomains = $collDomains;
			}
		}
		return $this->collDomains;
	}

	/**
	 * Returns the number of related Domain objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Domain objects.
	 * @throws     PropelException
	 */
	public function countDomains(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collDomains || null !== $criteria) {
			if ($this->isNew() && null === $this->collDomains) {
				return 0;
			} else {
				$query = DomainQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByWebsite($this)
					->count($con);
			}
		} else {
			return count($this->collDomains);
		}
	}

	/**
	 * Method called to associate a Domain object to this object
	 * through the Domain foreign key attribute.
	 *
	 * @param      Domain $l Domain
	 * @return     void
	 * @throws     PropelException
	 */
	public function addDomain(Domain $l)
	{
		if ($this->collDomains === null) {
			$this->initDomains();
		}
		if (!$this->collDomains->contains($l)) { // only add it if the **same** object is not already associated
			$this->collDomains[]= $l;
			$l->setWebsite($this);
		}
	}

	/**
	 * Clears out the collCouponUsages collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addCouponUsages()
	 */
	public function clearCouponUsages()
	{
		$this->collCouponUsages = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collCouponUsages collection.
	 *
	 * By default this just sets the collCouponUsages collection to an empty array (like clearcollCouponUsages());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initCouponUsages()
	{
		$this->collCouponUsages = new PropelObjectCollection();
		$this->collCouponUsages->setModel('CouponUsage');
	}

	/**
	 * Gets an array of CouponUsage objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Website is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array CouponUsage[] List of CouponUsage objects
	 * @throws     PropelException
	 */
	public function getCouponUsages($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collCouponUsages || null !== $criteria) {
			if ($this->isNew() && null === $this->collCouponUsages) {
				// return empty collection
				$this->initCouponUsages();
			} else {
				$collCouponUsages = CouponUsageQuery::create(null, $criteria)
					->filterByWebsite($this)
					->find($con);
				if (null !== $criteria) {
					return $collCouponUsages;
				}
				$this->collCouponUsages = $collCouponUsages;
			}
		}
		return $this->collCouponUsages;
	}

	/**
	 * Returns the number of related CouponUsage objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related CouponUsage objects.
	 * @throws     PropelException
	 */
	public function countCouponUsages(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collCouponUsages || null !== $criteria) {
			if ($this->isNew() && null === $this->collCouponUsages) {
				return 0;
			} else {
				$query = CouponUsageQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByWebsite($this)
					->count($con);
			}
		} else {
			return count($this->collCouponUsages);
		}
	}

	/**
	 * Method called to associate a CouponUsage object to this object
	 * through the CouponUsage foreign key attribute.
	 *
	 * @param      CouponUsage $l CouponUsage
	 * @return     void
	 * @throws     PropelException
	 */
	public function addCouponUsage(CouponUsage $l)
	{
		if ($this->collCouponUsages === null) {
			$this->initCouponUsages();
		}
		if (!$this->collCouponUsages->contains($l)) { // only add it if the **same** object is not already associated
			$this->collCouponUsages[]= $l;
			$l->setWebsite($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Website is new, it will return
	 * an empty collection; or if this Website has previously
	 * been saved, it will retrieve related CouponUsages from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Website.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array CouponUsage[] List of CouponUsage objects
	 */
	public function getCouponUsagesJoinCoupon($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = CouponUsageQuery::create(null, $criteria);
		$query->joinWith('Coupon', $join_behavior);

		return $this->getCouponUsages($query, $con);
	}

	/**
	 * Clears out the collEmailAccounts collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addEmailAccounts()
	 */
	public function clearEmailAccounts()
	{
		$this->collEmailAccounts = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collEmailAccounts collection.
	 *
	 * By default this just sets the collEmailAccounts collection to an empty array (like clearcollEmailAccounts());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initEmailAccounts()
	{
		$this->collEmailAccounts = new PropelObjectCollection();
		$this->collEmailAccounts->setModel('EmailAccount');
	}

	/**
	 * Gets an array of EmailAccount objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Website is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array EmailAccount[] List of EmailAccount objects
	 * @throws     PropelException
	 */
	public function getEmailAccounts($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collEmailAccounts || null !== $criteria) {
			if ($this->isNew() && null === $this->collEmailAccounts) {
				// return empty collection
				$this->initEmailAccounts();
			} else {
				$collEmailAccounts = EmailAccountQuery::create(null, $criteria)
					->filterByWebsite($this)
					->find($con);
				if (null !== $criteria) {
					return $collEmailAccounts;
				}
				$this->collEmailAccounts = $collEmailAccounts;
			}
		}
		return $this->collEmailAccounts;
	}

	/**
	 * Returns the number of related EmailAccount objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related EmailAccount objects.
	 * @throws     PropelException
	 */
	public function countEmailAccounts(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collEmailAccounts || null !== $criteria) {
			if ($this->isNew() && null === $this->collEmailAccounts) {
				return 0;
			} else {
				$query = EmailAccountQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByWebsite($this)
					->count($con);
			}
		} else {
			return count($this->collEmailAccounts);
		}
	}

	/**
	 * Method called to associate a EmailAccount object to this object
	 * through the EmailAccount foreign key attribute.
	 *
	 * @param      EmailAccount $l EmailAccount
	 * @return     void
	 * @throws     PropelException
	 */
	public function addEmailAccount(EmailAccount $l)
	{
		if ($this->collEmailAccounts === null) {
			$this->initEmailAccounts();
		}
		if (!$this->collEmailAccounts->contains($l)) { // only add it if the **same** object is not already associated
			$this->collEmailAccounts[]= $l;
			$l->setWebsite($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Website is new, it will return
	 * an empty collection; or if this Website has previously
	 * been saved, it will retrieve related EmailAccounts from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Website.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array EmailAccount[] List of EmailAccount objects
	 */
	public function getEmailAccountsJoinDomain($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = EmailAccountQuery::create(null, $criteria);
		$query->joinWith('Domain', $join_behavior);

		return $this->getEmailAccounts($query, $con);
	}

	/**
	 * Clears out the collPages collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addPages()
	 */
	public function clearPages()
	{
		$this->collPages = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collPages collection.
	 *
	 * By default this just sets the collPages collection to an empty array (like clearcollPages());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initPages()
	{
		$this->collPages = new PropelObjectCollection();
		$this->collPages->setModel('Page');
	}

	/**
	 * Gets an array of Page objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Website is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Page[] List of Page objects
	 * @throws     PropelException
	 */
	public function getPages($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collPages || null !== $criteria) {
			if ($this->isNew() && null === $this->collPages) {
				// return empty collection
				$this->initPages();
			} else {
				$collPages = PageQuery::create(null, $criteria)
					->filterByWebsite($this)
					->find($con);
				if (null !== $criteria) {
					return $collPages;
				}
				$this->collPages = $collPages;
			}
		}
		return $this->collPages;
	}

	/**
	 * Returns the number of related Page objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Page objects.
	 * @throws     PropelException
	 */
	public function countPages(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collPages || null !== $criteria) {
			if ($this->isNew() && null === $this->collPages) {
				return 0;
			} else {
				$query = PageQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByWebsite($this)
					->count($con);
			}
		} else {
			return count($this->collPages);
		}
	}

	/**
	 * Method called to associate a Page object to this object
	 * through the Page foreign key attribute.
	 *
	 * @param      Page $l Page
	 * @return     void
	 * @throws     PropelException
	 */
	public function addPage(Page $l)
	{
		if ($this->collPages === null) {
			$this->initPages();
		}
		if (!$this->collPages->contains($l)) { // only add it if the **same** object is not already associated
			$this->collPages[]= $l;
			$l->setWebsite($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Website is new, it will return
	 * an empty collection; or if this Website has previously
	 * been saved, it will retrieve related Pages from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Website.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Page[] List of Page objects
	 */
	public function getPagesJoinTemplateType($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = PageQuery::create(null, $criteria);
		$query->joinWith('TemplateType', $join_behavior);

		return $this->getPages($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Website is new, it will return
	 * an empty collection; or if this Website has previously
	 * been saved, it will retrieve related Pages from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Website.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Page[] List of Page objects
	 */
	public function getPagesJoinPageContentDisplayType($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = PageQuery::create(null, $criteria);
		$query->joinWith('PageContentDisplayType', $join_behavior);

		return $this->getPages($query, $con);
	}

	/**
	 * Clears out the collClientMessages collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addClientMessages()
	 */
	public function clearClientMessages()
	{
		$this->collClientMessages = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collClientMessages collection.
	 *
	 * By default this just sets the collClientMessages collection to an empty array (like clearcollClientMessages());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initClientMessages()
	{
		$this->collClientMessages = new PropelObjectCollection();
		$this->collClientMessages->setModel('ClientMessage');
	}

	/**
	 * Gets an array of ClientMessage objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Website is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array ClientMessage[] List of ClientMessage objects
	 * @throws     PropelException
	 */
	public function getClientMessages($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collClientMessages || null !== $criteria) {
			if ($this->isNew() && null === $this->collClientMessages) {
				// return empty collection
				$this->initClientMessages();
			} else {
				$collClientMessages = ClientMessageQuery::create(null, $criteria)
					->filterByWebsite($this)
					->find($con);
				if (null !== $criteria) {
					return $collClientMessages;
				}
				$this->collClientMessages = $collClientMessages;
			}
		}
		return $this->collClientMessages;
	}

	/**
	 * Returns the number of related ClientMessage objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ClientMessage objects.
	 * @throws     PropelException
	 */
	public function countClientMessages(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collClientMessages || null !== $criteria) {
			if ($this->isNew() && null === $this->collClientMessages) {
				return 0;
			} else {
				$query = ClientMessageQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByWebsite($this)
					->count($con);
			}
		} else {
			return count($this->collClientMessages);
		}
	}

	/**
	 * Method called to associate a ClientMessage object to this object
	 * through the ClientMessage foreign key attribute.
	 *
	 * @param      ClientMessage $l ClientMessage
	 * @return     void
	 * @throws     PropelException
	 */
	public function addClientMessage(ClientMessage $l)
	{
		if ($this->collClientMessages === null) {
			$this->initClientMessages();
		}
		if (!$this->collClientMessages->contains($l)) { // only add it if the **same** object is not already associated
			$this->collClientMessages[]= $l;
			$l->setWebsite($this);
		}
	}

	/**
	 * Clears out the collTemplateCustomizations collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addTemplateCustomizations()
	 */
	public function clearTemplateCustomizations()
	{
		$this->collTemplateCustomizations = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collTemplateCustomizations collection.
	 *
	 * By default this just sets the collTemplateCustomizations collection to an empty array (like clearcollTemplateCustomizations());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initTemplateCustomizations()
	{
		$this->collTemplateCustomizations = new PropelObjectCollection();
		$this->collTemplateCustomizations->setModel('TemplateCustomization');
	}

	/**
	 * Gets an array of TemplateCustomization objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Website is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array TemplateCustomization[] List of TemplateCustomization objects
	 * @throws     PropelException
	 */
	public function getTemplateCustomizations($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collTemplateCustomizations || null !== $criteria) {
			if ($this->isNew() && null === $this->collTemplateCustomizations) {
				// return empty collection
				$this->initTemplateCustomizations();
			} else {
				$collTemplateCustomizations = TemplateCustomizationQuery::create(null, $criteria)
					->filterByWebsite($this)
					->find($con);
				if (null !== $criteria) {
					return $collTemplateCustomizations;
				}
				$this->collTemplateCustomizations = $collTemplateCustomizations;
			}
		}
		return $this->collTemplateCustomizations;
	}

	/**
	 * Returns the number of related TemplateCustomization objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related TemplateCustomization objects.
	 * @throws     PropelException
	 */
	public function countTemplateCustomizations(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collTemplateCustomizations || null !== $criteria) {
			if ($this->isNew() && null === $this->collTemplateCustomizations) {
				return 0;
			} else {
				$query = TemplateCustomizationQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByWebsite($this)
					->count($con);
			}
		} else {
			return count($this->collTemplateCustomizations);
		}
	}

	/**
	 * Method called to associate a TemplateCustomization object to this object
	 * through the TemplateCustomization foreign key attribute.
	 *
	 * @param      TemplateCustomization $l TemplateCustomization
	 * @return     void
	 * @throws     PropelException
	 */
	public function addTemplateCustomization(TemplateCustomization $l)
	{
		if ($this->collTemplateCustomizations === null) {
			$this->initTemplateCustomizations();
		}
		if (!$this->collTemplateCustomizations->contains($l)) { // only add it if the **same** object is not already associated
			$this->collTemplateCustomizations[]= $l;
			$l->setWebsite($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Website is new, it will return
	 * an empty collection; or if this Website has previously
	 * been saved, it will retrieve related TemplateCustomizations from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Website.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array TemplateCustomization[] List of TemplateCustomization objects
	 */
	public function getTemplateCustomizationsJoinWebsiteTemplate($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = TemplateCustomizationQuery::create(null, $criteria);
		$query->joinWith('WebsiteTemplate', $join_behavior);

		return $this->getTemplateCustomizations($query, $con);
	}

	/**
	 * Clears out the collCoupons collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addCoupons()
	 */
	public function clearCoupons()
	{
		$this->collCoupons = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collCoupons collection.
	 *
	 * By default this just sets the collCoupons collection to an empty collection (like clearCoupons());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initCoupons()
	{
		$this->collCoupons = new PropelObjectCollection();
		$this->collCoupons->setModel('Coupon');
	}

	/**
	 * Gets a collection of Coupon objects related by a many-to-many relationship
	 * to the current object by way of the esq_coupon_usage cross-reference table.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Website is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     PropelCollection|array Coupon[] List of Coupon objects
	 */
	public function getCoupons($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collCoupons || null !== $criteria) {
			if ($this->isNew() && null === $this->collCoupons) {
				// return empty collection
				$this->initCoupons();
			} else {
				$collCoupons = CouponQuery::create(null, $criteria)
					->filterByWebsite($this)
					->find($con);
				if (null !== $criteria) {
					return $collCoupons;
				}
				$this->collCoupons = $collCoupons;
			}
		}
		return $this->collCoupons;
	}

	/**
	 * Gets the number of Coupon objects related by a many-to-many relationship
	 * to the current object by way of the esq_coupon_usage cross-reference table.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      boolean $distinct Set to true to force count distinct
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     int the number of related Coupon objects
	 */
	public function countCoupons($criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collCoupons || null !== $criteria) {
			if ($this->isNew() && null === $this->collCoupons) {
				return 0;
			} else {
				$query = CouponQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByWebsite($this)
					->count($con);
			}
		} else {
			return count($this->collCoupons);
		}
	}

	/**
	 * Associate a Coupon object to this object
	 * through the esq_coupon_usage cross reference table.
	 *
	 * @param      Coupon $coupon The CouponUsage object to relate
	 * @return     void
	 */
	public function addCoupon($coupon)
	{
		if ($this->collCoupons === null) {
			$this->initCoupons();
		}
		if (!$this->collCoupons->contains($coupon)) { // only add it if the **same** object is not already associated
			$couponUsage = new CouponUsage();
			$couponUsage->setCoupon($coupon);
			$this->addCouponUsage($couponUsage);

			$this->collCoupons[]= $coupon;
		}
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->cg_id = null;
		$this->cim_customer_profile_id = null;
		$this->cim_payment_profile_id = null;
		$this->customer_id = null;
		$this->type = null;
		$this->rank = null;
		$this->firm_name = null;
		$this->firm_type = null;
		$this->website_name = null;
		$this->primary_domain_id = null;
		$this->email = null;
		$this->address = null;
		$this->city = null;
		$this->state = null;
		$this->zip = null;
		$this->phone = null;
		$this->fax = null;
		$this->template_id = null;
		$this->website_attribute_id = null;
		$this->status = null;
		$this->path = null;
		$this->host_id = null;
		$this->analytics_code = null;
		$this->payment_account_id = null;
		$this->meta_description = null;
		$this->meta_keywords = null;
		$this->social_media = null;
		$this->last_payment_update = null;
		$this->last_billing_date = null;
		$this->cancelled_at = null;
		$this->created_at = null;
		$this->updated_at = null;
		$this->alreadyInSave = false;
		$this->alreadyInValidation = false;
		$this->clearAllReferences();
		$this->resetModified();
		$this->setNew(true);
		$this->setDeleted(false);
	}

	/**
	 * Resets all collections of referencing foreign keys.
	 *
	 * This method is a user-space workaround for PHP's inability to garbage collect objects
	 * with circular references.  This is currently necessary when using Propel in certain
	 * daemon or large-volumne/high-memory operations.
	 *
	 * @param      boolean $deep Whether to also clear the references on all associated objects.
	 */
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collCheddarGetterNotifications) {
				foreach ((array) $this->collCheddarGetterNotifications as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collDomains) {
				foreach ((array) $this->collDomains as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collCouponUsages) {
				foreach ((array) $this->collCouponUsages as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collEmailAccounts) {
				foreach ((array) $this->collEmailAccounts as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collPages) {
				foreach ((array) $this->collPages as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collClientMessages) {
				foreach ((array) $this->collClientMessages as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collTemplateCustomizations) {
				foreach ((array) $this->collTemplateCustomizations as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collCheddarGetterNotifications = null;
		$this->collDomains = null;
		$this->collCouponUsages = null;
		$this->collEmailAccounts = null;
		$this->collPages = null;
		$this->collClientMessages = null;
		$this->collTemplateCustomizations = null;
		$this->aCustomer = null;
		$this->aPrimaryDomain = null;
		$this->aWebsiteTemplate = null;
		$this->aWebsiteAttribute = null;
		$this->aHost = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string The value of the 'firm_name' column
	 */
	public function __toString()
	{
		return (string) $this->getFirmName();
	}

	// sortable behavior
	
	/**
	 * Wrap the getter for scope value
	 *
	 * @return    int
	 */
	public function getScopeValue()
	{
		return $this->customer_id;
	}
	
	/**
	 * Wrap the setter for scope value
	 *
	 * @param     int
	 * @return    Website
	 */
	public function setScopeValue($v)
	{
		return $this->setCustomerId($v);
	}
	
	/**
	 * Check if the object is first in the list, i.e. if it has 1 for rank
	 *
	 * @return    boolean
	 */
	public function isFirst()
	{
		return $this->getRank() == 1;
	}
	
	/**
	 * Check if the object is last in the list, i.e. if its rank is the highest rank
	 *
	 * @param     PropelPDO  $con      optional connection
	 *
	 * @return    boolean
	 */
	public function isLast(PropelPDO $con = null)
	{
		return $this->getRank() == WebsiteQuery::create()->getMaxRank($this->getCustomerId(), $con);
	}
	
	/**
	 * Get the next item in the list, i.e. the one for which rank is immediately higher
	 *
	 * @param     PropelPDO  $con      optional connection
	 *
	 * @return    Website
	 */
	public function getNext(PropelPDO $con = null)
	{
		return WebsiteQuery::create()
			->filterByRank($this->getRank() + 1)
			->inList($this->getCustomerId())
			->findOne($con);
	}
	
	/**
	 * Get the previous item in the list, i.e. the one for which rank is immediately lower
	 *
	 * @param     PropelPDO  $con      optional connection
	 *
	 * @return    Website
	 */
	public function getPrevious(PropelPDO $con = null)
	{
		return WebsiteQuery::create()
			->filterByRank($this->getRank() - 1)
			->inList($this->getCustomerId())
			->findOne($con);
	}
	
	/**
	 * Insert at specified rank
	 * The modifications are not persisted until the object is saved.
	 *
	 * @param     integer    $rank rank value
	 * @param     PropelPDO  $con      optional connection
	 *
	 * @return    Website the current object
	 *
	 * @throws    PropelException
	 */
	public function insertAtRank($rank, PropelPDO $con = null)
	{
		if (null === $this->getCustomerId()) {
			throw new PropelException('The scope must be defined before inserting an object in a suite');
		}
		$maxRank = WebsiteQuery::create()->getMaxRank($this->getCustomerId(), $con);
		if ($rank < 1 || $rank > $maxRank + 1) {
			throw new PropelException('Invalid rank ' . $rank);
		}
		// move the object in the list, at the given rank
		$this->setRank($rank);
		if ($rank != $maxRank + 1) {
			// Keep the list modification query for the save() transaction
			$this->sortableQueries []= array(
				'callable'  => array('WebsitePeer', 'shiftRank'),
				'arguments' => array(1, $rank, null, $this->getCustomerId())
			);
		}
		
		return $this;
	}
	
	/**
	 * Insert in the last rank
	 * The modifications are not persisted until the object is saved.
	 *
	 * @param PropelPDO $con optional connection
	 *
	 * @return    Website the current object
	 *
	 * @throws    PropelException
	 */
	public function insertAtBottom(PropelPDO $con = null)
	{
		if (null === $this->getCustomerId()) {
			throw new PropelException('The scope must be defined before inserting an object in a suite');
		}
		$this->setRank(WebsiteQuery::create()->getMaxRank($this->getCustomerId(), $con) + 1);
		
		return $this;
	}
	
	/**
	 * Insert in the first rank
	 * The modifications are not persisted until the object is saved.
	 *
	 * @return    Website the current object
	 */
	public function insertAtTop()
	{
		return $this->insertAtRank(1);
	}
	
	/**
	 * Move the object to a new rank, and shifts the rank
	 * Of the objects inbetween the old and new rank accordingly
	 *
	 * @param     integer   $newRank rank value
	 * @param     PropelPDO $con optional connection
	 *
	 * @return    Website the current object
	 *
	 * @throws    PropelException
	 */
	public function moveToRank($newRank, PropelPDO $con = null)
	{
		if ($this->isNew()) {
			throw new PropelException('New objects cannot be moved. Please use insertAtRank() instead');
		}
		if ($con === null) {
			$con = Propel::getConnection(WebsitePeer::DATABASE_NAME);
		}
		if ($newRank < 1 || $newRank > WebsiteQuery::create()->getMaxRank($this->getCustomerId(), $con)) {
			throw new PropelException('Invalid rank ' . $newRank);
		}
	
		$oldRank = $this->getRank();
		if ($oldRank == $newRank) {
			return $this;
		}
		
		$con->beginTransaction();
		try {
			// shift the objects between the old and the new rank
			$delta = ($oldRank < $newRank) ? -1 : 1;
			WebsitePeer::shiftRank($delta, min($oldRank, $newRank), max($oldRank, $newRank), $this->getCustomerId(), $con);
				
			// move the object to its new rank
			$this->setRank($newRank);
			$this->save($con);
			
			$con->commit();
			return $this;
		} catch (Exception $e) {
			$con->rollback();
			throw $e;
		}
	}
	
	/**
	 * Exchange the rank of the object with the one passed as argument, and saves both objects
	 *
	 * @param     Website $object
	 * @param     PropelPDO $con optional connection
	 *
	 * @return    Website the current object
	 *
	 * @throws Exception if the database cannot execute the two updates
	 */
	public function swapWith($object, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(WebsitePeer::DATABASE_NAME);
		}
		$con->beginTransaction();
		try {
			$oldRank = $this->getRank();
			$newRank = $object->getRank();
			$this->setRank($newRank);
			$this->save($con);
			$object->setRank($oldRank);
			$object->save($con);
			$con->commit();
			
			return $this;
		} catch (Exception $e) {
			$con->rollback();
			throw $e;
		}
	}
	
	/**
	 * Move the object higher in the list, i.e. exchanges its rank with the one of the previous object
	 *
	 * @param     PropelPDO $con optional connection
	 *
	 * @return    Website the current object
	 */
	public function moveUp(PropelPDO $con = null)
	{
		if ($this->isFirst()) {
			return $this;
		}
		if ($con === null) {
			$con = Propel::getConnection(WebsitePeer::DATABASE_NAME);
		}
		$con->beginTransaction();
		try {
			$prev = $this->getPrevious($con);
			$this->swapWith($prev, $con);
			$con->commit();
			
			return $this;
		} catch (Exception $e) {
			$con->rollback();
			throw $e;
		}
	}
	
	/**
	 * Move the object higher in the list, i.e. exchanges its rank with the one of the next object
	 *
	 * @param     PropelPDO $con optional connection
	 *
	 * @return    Website the current object
	 */
	public function moveDown(PropelPDO $con = null)
	{
		if ($this->isLast($con)) {
			return $this;
		}
		if ($con === null) {
			$con = Propel::getConnection(WebsitePeer::DATABASE_NAME);
		}
		$con->beginTransaction();
		try {
			$next = $this->getNext($con);
			$this->swapWith($next, $con);
			$con->commit();
			
			return $this;
		} catch (Exception $e) {
			$con->rollback();
			throw $e;
		}
	}
	
	/**
	 * Move the object to the top of the list
	 *
	 * @param     PropelPDO $con optional connection
	 *
	 * @return    Website the current object
	 */
	public function moveToTop(PropelPDO $con = null)
	{
		if ($this->isFirst()) {
			return $this;
		}
		return $this->moveToRank(1, $con);
	}
	
	/**
	 * Move the object to the bottom of the list
	 *
	 * @param     PropelPDO $con optional connection
	 *
	 * @return integer the old object's rank
	 */
	public function moveToBottom(PropelPDO $con = null)
	{
		if ($this->isLast($con)) {
			return false;
		}
		if ($con === null) {
			$con = Propel::getConnection(WebsitePeer::DATABASE_NAME);
		}
		$con->beginTransaction();
		try {
			$bottom = WebsiteQuery::create()->getMaxRank($this->getCustomerId(), $con);
			$res = $this->moveToRank($bottom, $con);
			$con->commit();
			
			return $res;
		} catch (Exception $e) {
			$con->rollback();
			throw $e;
		}
	}
	
	/**
	 * Removes the current object from the list.
	 * The modifications are not persisted until the object is saved.
	 *
	 * @return    Website the current object
	 */
	public function removeFromList()
	{
		// Keep the list modification query for the save() transaction
		$this->sortableQueries []= array(
			'callable'  => array('WebsitePeer', 'shiftRank'),
			'arguments' => array(-1, $this->getRank() + 1, null, $this->getCustomerId())
		);
		// remove the object from the list
		$this->setRank(null);
		$this->setCustomerId(null);
		
		return $this;
	}
	
	/**
	 * Execute queries that were saved to be run inside the save transaction
	 */
	protected function processSortableQueries($con)
	{
		foreach ($this->sortableQueries as $query) {
			$query['arguments'][]= $con;
			call_user_func_array($query['callable'], $query['arguments']);
		}
		$this->sortableQueries = array();
	}

	// timestampable behavior
	
	/**
	 * Mark the current object so that the update date doesn't get updated during next save
	 *
	 * @return     Website The current object (for fluent API support)
	 */
	public function keepUpdateDateUnchanged()
	{
		$this->modifiedColumns[] = WebsitePeer::UPDATED_AT;
		return $this;
	}

	/**
	 * Catches calls to virtual methods
	 */
	public function __call($name, $params)
	{
		// symfony_behaviors behavior
		if ($callable = sfMixer::getCallable('BaseWebsite:' . $name))
		{
		  array_unshift($params, $this);
		  return call_user_func_array($callable, $params);
		}

		if (preg_match('/get(\w+)/', $name, $matches)) {
			$virtualColumn = $matches[1];
			if ($this->hasVirtualColumn($virtualColumn)) {
				return $this->getVirtualColumn($virtualColumn);
			}
			// no lcfirst in php<5.3...
			$virtualColumn[0] = strtolower($virtualColumn[0]);
			if ($this->hasVirtualColumn($virtualColumn)) {
				return $this->getVirtualColumn($virtualColumn);
			}
		}
		return parent::__call($name, $params);
	}

} // BaseWebsite
