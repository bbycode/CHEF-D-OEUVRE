<?php
/**
 *
 */
class ArticlesManager
{
  private $_data;
  public function add(Article $article)
  {
    $request = 'INSERT INTO Articles
    (
      rate,
      cost,
      unit_type,
      taxes,
      description
    )
    VALUES
    (
      :rate,
      :cost,
      :unit_type;
      :taxes,
      :description
    )';
    $result = $this->_data->prepare($request);
    $result->bindValue(':rate',$article->getRate());
    $result->bindValue(':cost', $article->getCost());
    $result->bindValue(':unit_type',$article->getUnitType());
    $result->bindValue(':taxes',$article->getTaxes());
    $result->bindValue(':description',$article->getDescription());
    $result->execute();
  }
  public function delete(Article $article)
  {
    $request ='DELETE FROM Articles
    WHERE
    article_id='.$article->getArticleId();
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

  function __construct($data)
  {
    $this->setData();
  }
}

?>
