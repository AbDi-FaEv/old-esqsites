<?php
/**
 *
 * @author Richtermeister
 */
class domainsComponents extends sfComponents
{
  public function executeExpiring()
  {
    $this -> domains = DomainQuery::create() -> 
      filterByRegistrationType(Domain::REGISTRATION_TYPE_ESQ) ->
      filterByReal() ->
      filterByExpirationDate(null, Criteria::ISNOTNULL) ->
      orderByExpirationDate() ->
      limit(5) ->
      find();
  }
}