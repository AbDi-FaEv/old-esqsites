<?php


/**
 * performs query and update operations on the 'esq_domain_names' table.
 *
 */
class DomainQuery extends BaseDomainQuery
{
  /**
   * filters this query for domains that are purchased and active
   *
   * @return DomainQuery
   */
  public function filterByReal()
  {
    return $this -> filterByType(Domain::TYPE_PURCHASED) ->
      filterByStatus(Domain::STATUS_ACTIVE);
  }

  /**
   * filters this query for domains that forgivingly match on name
   * prefixes like http and www are ignored in this search
   *
   * @return DomainQuery
   */
  public function filterByDirtyName($name)
  {
    $name = preg_replace(";^http:\/\/(www\.)?;", "", $name);
    
    return $this -> filterByName($name);
  }

  /**
   * filters this query for domains that are due for renewal between now and the specified cut-off date
   *
   * @param timestamp $cutoff_date a date in the future, defaults to +1 month
   * @return DomainQuery
   */
  public function filterByDueForRenewal($cutoff_date = null)
  {
    if(null === $cutoff_date) $cutoff_date = strtotime("+1 month");

    return $this -> useWebsiteQuery() ->
        useCustomerQuery() ->
          filterByReal() ->
        endUse() ->
      endUse() ->
      filterByIsAutoRenew(true) ->
      filterByRegistrationType(Domain::REGISTRATION_TYPE_ESQ) ->
      filterByExpirationDate(array("max" => $cutoff_date));
  }
}