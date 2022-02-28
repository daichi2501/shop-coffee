 <?php
class ProductModel extends BaseModel
{
	const TABLE = 'product';
	const TABLE_JOIN = 'category';

	public function selectAllProduct($select = ['*'], $orderBys=[]){
		return $this->select(self::TABLE, $select, $orderBys);
	}
	public function selectProductJoin($select = [''], $select1 = [''], $id){
		return $this->innerjoin(self::TABLE, self::TABLE_JOIN, $select, $select1, $id);
	}
	public function selectProductJoinPaging($select = [''], $select1 = [''], $id, $limit, $page){
		return $this->innerjoinPaging(self::TABLE, self::TABLE_JOIN, $select, $select1, $id, $limit, $page);
	}
	public function selectByName($column, $s = ''){
		return $this->find(self::TABLE, $column, $s);
	}
	public function selectAllProductByName($select = [''], $select1 = [''], $id, $name_column, $name){
		return $this->selectJoinByName(self::TABLE, self::TABLE_JOIN, $select, $select1, $id, $name_column, $name);
	}
	public function selectProductJoinById($select = [''], $select1 = [''], $id, $name_column, $id_key){
		return $this->selectJoinById(self::TABLE, self::TABLE_JOIN, $select, $select1, $id, $name_column, $id_key);
	}
	public function selectProductById($id){
		return $this->selectById(self::TABLE, $id);
	}
	public function insertProduct($select = [''], $data = ['']){
		return $this->insert(self::TABLE, $select, $data);
	}
	public function deleteProductById($id){
		return $this->delete(self::TABLE, $id);
	}
	public function updateProduct($select = [''], $data = [''], $id){
		return $this->update(self::TABLE, $select, $data, $id);
	}
}