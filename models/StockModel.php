<?php
class StockModel extends BaseModel{
	const TABLE = 'stock';
	const TABLE_JOIN = 'product';
	public function selectAllStock($select = ['*'], $orderBys = [])
	{
		return $this->select(self::TABLE, $select, $orderBys);
	}
	public function paging($limit, $page){
		return $this->pagination(self::TABLE, $limit, $page);
	}
	public function selectStockJoinPaging($select = [''], $select1 = [''], $id, $limit, $page){
		return $this->innerjoinPaging(self::TABLE, self::TABLE_JOIN, $select, $select1, $id, $limit, $page);
	}
	public function selectStockJoinById($select = [''], $select1 = [''], $id, $name_column, $id_key){
		return $this->selectJoinById(self::TABLE, self::TABLE_JOIN, $select, $select1, $id, $name_column, $id_key);
	}
	public function selectStockAllById($column, $id){
		return $this->selectByIdAllRecord(self::TABLE, $column, $id);
	}
	public function selectStockById($column, $id){
		return $this->selectByIdLink(self::TABLE, $column, $id);
	}
	public function sumStock($select ,$column, $id, $column1, $action){
		return $this->sum(self::TABLE, $select ,$column, $id, $column1, $action);
	}
	public function deleteStockById($id){
		return $this->delete(self::TABLE, $id);
	}
	public function insertStock($select = [''], $data = ['']){
		return $this->insert(self::TABLE, $select, $data);
	} 
	public function updateStock($select = [''], $data = [''], $id){
		return $this->update(self::TABLE, $select, $data, $id);
	}
}
