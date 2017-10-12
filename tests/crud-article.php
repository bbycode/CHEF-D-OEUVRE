<?php
require_once('../Model/Article.class.php');
/**
 *
 */
class ArticlesManager
{
  //Instance de la base de donnees
  private $_data;
  /**
  *Methode pour ajouter un article
  */
  public function add(Article $article)
  {
    //La requête
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
  /**
  *Méthode pour supprimer un article
  */
  public function delete(Article $article)
  {
    $request ='DELETE FROM Articles
    WHERE article_id ='. $article->getArticleId();
    $this->_data->exec($request);
  }
  /**
  *Méthode pour récupérer un article
  *à partir de son id.
  */
  public function get($article_id)
  {
    //Un cast pour pour le transformer
    //en int.
    $article_id = (int) $article_id;
    //la requête.
    $request = 'SELECT
    article_id,
    rate,
    cost,
    unit_type,
    taxes,
    description
    FROM Articles WHERE article_id ='.$article_id;
    $result = $this->_data->query($request);
    $tofill = $result->fetch(PDO::FETCH_ASSOC);
    $result = new Article();
    $result->hydrate($tofill);
    return $result;
  }
  /**
  *Méthode pour renvoyer la liste
  *de tous les articles.
  */
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
    FROM Articles';
    $result = $this->_data->query($request);
    //crée un tableau associatif  avec
    //toutes les lignes de la table.
    $list = $result->fetchAll(PDO::FETCH_ASSOC);
    foreach ($list as $key => $tofill)
    {
        //Crée un objet
        $tmp = new Article();
        //Hydrate l'objet
        $tmp->hydrate($tofill);
        //Stocke le résultat dans un tableau.
        $articles[] = $tmp;
    }
    return $articles;
  }
/**
*Méthode pour mettre a jour un article.
*/
public function update(Article $article, array $toupdate)
{
  //la requête
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
  $result->bindValue(':rate',$toupdate['rate']);
  $result->bindValue(':cost', $toupdate['cost']);
  $result->bindValue(':unit_type',$toupdate['unit_type']);
  $result->bindValue(':taxes',$toupdate['taxes']);
  $result->bindValue(':description',$toupdate['description']);
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
  //echo "connecté";
} catch(PDOException $eMsg){
  print "Erreur de connexion !:" .$eMsg->getMessage()."</br>";
  //echo "non connecté";
  die();

}

$manager = new ArticlesManager($db);
$listomates = $manager->getList();
$toupdate = ["description"=>"Cabling Network",
"rate"=>"100","cost"=>"30","unit_type"=>'Heure',
"taxes"=>"21%"];
$tomate = $manager->get(7);
$manager->update($tomate, $toupdate);

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
        print_r($listomates);
      ?>
    </pre>
  </body>
</html>
