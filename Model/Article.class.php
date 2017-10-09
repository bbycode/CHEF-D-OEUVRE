<?php
/**
 * Classe Article
 */
class Article
{
  private $_article_id;
  //Tarifs
  private $_rate;
  //Coûts
  private $_cost;
  //Type unite de facturation jour, heure, ..
  private $_unit_type;
  //Le pourcentage de la TVA
  private $_taxes;
  //Description des articles.
  private $_description;
  //Date de la dernière mise à jour
  private $_update_time;
  //Génère des méthode a la volée a partir des
  //nom de la base de données
  private function genMethod($prop)
  {
    $method = 'set';
    $property = explode('_',$prop,PHP_INT_MAX);
    foreach ($property as $key => $value) {
      $method .=ucfirst($value);
    }
    return $method;
  }


  function __construct()
  {
    $this->_rate = 0;
    $this->_cost = 0;
    $this->_unit_type = "Day";
    $this->_taxes ="21%";
    $this->_description ="";
  }

    /**
     * Get the value of Classe Article
     *
     * @return mixed
     */
    public function getArticleId()
    {
        return $this->_article_id;
    }

    /**
     * Set the value of Classe Article
     *
     * @param mixed _article_id
     *
     * @return self
     */
    public function setArticleId($article_id)
    {
        $article_id = (int) $article_id;
        $this->_article_id = $article_id;

        return $this;
    }

    /**
     * Get the value of Rate
     *
     * @return mixed
     */
    public function getRate()
    {
        return $this->_rate;
    }

    /**
     * Set the value of Rate
     *
     * @param mixed _rate
     *
     * @return self
     */
    public function setRate($rate)
    {
        $this->_rate = $rate;

        return $this;
    }

    /**
     * Get the value of Cost
     *
     * @return mixed
     */
    public function getCost()
    {
        return $this->_cost;
    }

    /**
     * Set the value of Cost
     *
     * @param mixed _cost
     *
     * @return self
     */
    public function setCost($cost)
    {
        $this->_cost = $cost;

        return $this;
    }

    /**
     * Get the value of Unit Type
     *
     * @return mixed
     */
    public function getUnitType()
    {
        return $this->_unit_type;
    }

    /**
     * Set the value of Unit Type
     *
     * @param mixed _unit_type
     *
     * @return self
     */
    public function setUnitType($unit_type)
    {
        $this->_unit_type = $unit_type;

        return $this;
    }

    /**
     * Get the value of Taxes
     *
     * @return mixed
     */
    public function getTaxes()
    {
        return $this->_taxes;
    }

    /**
     * Set the value of Taxes
     *
     * @param mixed _taxes
     *
     * @return self
     */
    public function setTaxes($taxes)
    {
        $this->_taxes = $taxes;

        return $this;
    }

    /**
     * Get the value of Description
     *
     * @return mixed
     */
    public function getDescription()
    {
        return $this->_description;
    }

    /**
     * Set the value of Description
     *
     * @param mixed _description
     *
     * @return self
     */
    public function setDescription($description)
    {
        $this->_description = $description;

        return $this;
    }

    /**
     * Get the value of Update Time
     *
     * @return mixed
     */
    public function getUpdateTime()
    {
        return $this->_update_time;
    }

    /**
     * Set the value of Update Time
     *
     * @param mixed _update_time
     *
     * @return self
     */
    public function hydrate(array $tofill)
    {
      /**
      * fill the object.
      */
      foreach ($tofill as $key => $value) {
        $method = $this->genMethod($key);
        $property = '_'.$key;

        if(method_exists($this, $method))
        {
          $this->$property = $value;
        }
      }

    }
    public function setUpdateTime($update_time)
    {
        $this->_update_time = $update_time;

        return $this;
    }

}
//test
// $cup = ["article_id"=>1,"rate"=>1500, "cost"=>340,
// "description"=>"Projet Proximus N240","update_time"=>Time(245)];
// $tomate = new Article();
//
// $tomate->hydrate($cup);

?>
<!-- <!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>test</title>
  </head>
  <body>
    <pre>
      <?php
      //  print_r($tomate);
       ?>
    </pre>
  </body>
</html> -->
