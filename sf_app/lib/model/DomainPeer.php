<?php

class DomainPeer extends BaseDomainPeer
{
  public static function getActiveCriteria($c = null)
  {
    if(null == $c)
    {
      $c = new Criteria();
    }
    $c -> add(self::STATUS, Domain::STATUS_ACTIVE);
    return $c;
  }

  public static function getActive()
  {
    return self::doSelect(self::getActiveCriteria());
  }

  public static function generatePk()
  {
    do
    {
      $pk = substr(md5(rand()), 0, 32);
    }
    while(self::retrieveByPk($pk));

    return $pk;
  }

  public static function retrieveByName($name, $active = true)
  {
    $c = new Criteria();
    $c -> add(self::NAME, $name);
    if($active)
    {
      $c -> add(self::TYPE, Domain::TYPE_PURCHASED);
      $c -> add(self::STATUS, Domain::STATUS_ACTIVE);
    }
    return self::doSelectOne($c);
  }

  public static function generateDomainsForCustomer(Website $website, $valid_only = true)
  {
    $to_replace = array(" ", "_", ".", ",", "\\", "/", '$', '#');

    $customer = $website -> getCustomer();

    $data["first_name"] = $customer -> getFirstName();
    $data["last_name"] = $customer -> getLastName();
    $data["city"] = $website -> getCity();
    $data["firm_name"] = $website -> getFirmName();

    foreach($data as $key => $value)
    {
      $data[$key] = str_replace($to_replace, "", ucwords($value));
    }

    if($data["first_name"].$data["last_name"] == "")
    {
      return null;
    }


    $options[] = $data["first_name"].$data["last_name"];
    $options[] = $data["first_name"].$data["last_name"]."Law";
    $options[] = $data["first_name"].$data["last_name"]."LawOffice";
    $options[] = $data["first_name"].$data["last_name"]."LawOffices";
    if(isset($data["firm_name"]) && ($data["firm_name"] != ""))
    {
      $options[] = $data["firm_name"];
      $options[] = $data["firm_name"].$data["city"];
    }

    if(isset($data["area_of_practice"]) && ($data["area_of_practice"] != ""))
    {
      $options[] = $data["area_of_practice"]."Law";
      $options[] = $data["city"].$data["area_of_practice"]."Law";
    }

    foreach($options as $option)
    {
      $domain_options[] = $option.".com"; //also check .nets, etc?
    }

    if(!is_array($domain_options))
    {
      return null;
    }

    return $valid_only ? esqDomainValidator::filterAvailable($domain_options) : $domain_options;
  }

}
