<?php 
class OrderModel extends BaseModel{

	const TABLE_ORDER_ACCOUNT = 'order_account';
	const TABLE_ORDER_DETAIL = 'order_detail';
	const TABLE_PRODUCT = 'product';
	const TABLE_ACCOUNT = 'account';
	public function selectAllOrderAccount($select = ['*'], $orderBys = []){
		return $this->select(self::TABLE_ORDER_ACCOUNT, $select, $orderBys);
	}

	public function selectOrderJoinById($select = [''], $select1 = [''], $id, $name_column, $id_key){
		return $this->selectJoinById(self::TABLE, self::TABLE_PRODUCT, $select, $select1, $id, $name_column, $id_key);
	}
	public function selectOrderTripleJoin($table, $table1, $table2, $select = [''], $select1 = [''], $select2 = [''], $id, $id1){
		return $this->triplejoin(self::TABLE, self::TABLE_ACCOUNT, self::TABLE_PRODUCT, $select = [''], $select1 = [''], $select2 = [''], $id, $id1);
	}
	public function selectOrderTripleJoinById($table, $table1, $table2, $select = [''], $select1 = [''], $select2 = [''], $id, $id1, $id_account){
		return $this->triplejoinById(self::TABLE, self::TABLE_PRODUCT, self::TABLE_ACCOUNT, $select = [''], $select1 = [''], $select2 = [''], $id, $id1, $id_account);
	}
	public function selectAllOrderDetailById($select = [''], $select1 = [''], $id, $name_column, $id_key){
		return $this->selectAllJoinById(self::TABLE_ORDER_DETAIL, self::TABLE_PRODUCT, $select, $select1, $id, $name_column, $id_key);
	}
	public function selectOrderById($column, $id){
		return $this->selectByIdLink(self::TABLE_ORDER_ACCOUNT, $column, $id);
	}
	public function pagingOrder($select = [''], $select1 = [''], $id, $limit, $page){
		return $this->innerjoinPaging(self::TABLE_ORDER_ACCOUNT, self::TABLE_ACCOUNT, $select, $select1, $id, $limit, $page);
	}
	public function insertOrderAccount($select = [''], $data = ['']){
		return $this->insert(self::TABLE_ORDER_ACCOUNT, $select, $data);
	}
	public function insertOrderDetail($select = [''], $data = ['']){
		return $this->insert(self::TABLE_ORDER_DETAIL, $select, $data);
	}
	public function deleteOrderById($id){
		return $this->delete(self::TABLE_ORDER_ACCOUNT, $id);
	}
}