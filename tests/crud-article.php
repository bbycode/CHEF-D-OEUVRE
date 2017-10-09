<?php
require_once('../Model/Article.class.php');
/**
 *
 */
class ArticlesManager
{
  private $_data;
  public function add(Article $article)
  {
    $request = 'INSERT INTO Articles
    (rate,
     cost,
     unit_type,
     taxes,
     description)
    VALUES
    (:rate,
    :cost,
    :unit_type,
    :taxes,
    :description)';
    $result = $this->_data->prepare($request);
    $result->bindValue(':rate',$article->getRate());
    $result->bindValue(':cost', $article->getCost());
    $result->bindValue(':unit_type',$article->getUnitType(), PDO::PARAM_STR);
    $result->bindValue(':taxes',$article->getTaxes());
    $result->bindValue(':description',$article->getDescription(), PDO::PARAM_STR);
    $result->execute();
  }
  public function delete(Article $article)
  {
    echo $article->getArticleId();
    $request ='DELETE FROM Articles
    WHERE article_id ='. $article->getArticleId();
    echo $request."<br>";
    $this->_data->exec($request);
  }
  public function get($article_id)
  {
    $article_id = (int) $article_id;
    $request = 'SELECT
    article_id,
    rate,
    cost,
    unit_type,
    taxes,
    description
    FROM Articles WHERE id ='.$article_id;
    $result = $this->_data->query($request);
    $tofill = $result->fetch(PDO::FETCH_ASSOC);
    return new Article($tofill);
  }
  public function getList()
  {
    $articles = [];
    $request = 'SELECT
    article_id,
    rate,
    cost,
    unit_type,
    taxes,
    description
    FROM Articles ORDER BY article_id';
    $result = $this->_data->query($request);

    while ($tofill = $request->fetch(PDO::FETCH_ASSOC))
    {
      $articles[] = new Article($tofill);
    }
    return $articles;
  }
public function update(Article $article)
{
  $request = 'UPDATE Articles SET
  (

    rate = :rate,
    cost = :cost,
    unit_type = :unit_type,
    taxes = :taxes,
    description = :description
  )
  WHERE article_id ='.$article->getArticleId();
  $result = $this->_data->prepare($request);
  $result->bindValue(':rate',$article->getRate());
  $result->bindValue(':cost', $article->getCost());
  $result->bindValue(':unit_type',$article->getUnitType());
  $result->bindValue(':taxes',$article->getTaxes());
  $result->bindValue(':description',$article->getDescription());
  $result->execute();

}
/**
 * Set the value of Data
 *
 * @param mixed _data
 *
 * @return self
 */
public function setData($data)
{
    $this->_data = $data;

    return $this;
}
  function __construct($data)
  {
    $this->setData($data);
  }
}

$cup = ["rate"=>1500,
"cost"=>340,
"description"=>"Projet Proximus N240"];
$tomate = new Article();
$tomate->hydrate($cup);
try {
  $db = new PDO('mysql:host=localhost;dbname=billing',
  'gillou','user');
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "connecté";
} catch(PDOException $eMsg){
  print "Erreur de connexion !:" .$eMsg->getMessage()."</br>";
  echo "non connecté";
  die();

}

$manager = new ArticlesManager($db);
$manager->add($tomate);
$tomate->hydrate(["article_id"=>1]);

// $manager->update($tomate);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>test</title>
  </head>
  <body>
    <pre>
      <?php
        print_r($tomate);
       ?>
    </pre>
  </body>
</html>
?>
