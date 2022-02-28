<?php
class AccountModel extends BaseModel
{
	const TABLE = 'account';
	const TABLE_ROLE = 'role';
	const TABLE_ACCOUNT_ROLE = 'account_role';
	const TABLE_ORDER = 'order_product';

	public function selectAllAccount($select = ['*'], $orderBys=[]){
		return $this->select(self::TABLE, $select, $orderBys);
	}
	public function selectAllAccountRole($column, $id){
		return $this->selectByIdLink(self::TABLE_ACCOUNT_ROLE, $column, $id);
	}
	public function selectAccountJoin($select = [''], $select1 = [''], $id){
		return $this->innerjoin(self::TABLE, self::TABLE_ROLE, $select, $select1, $id);
	}
	public function selectAccountOrder($select = [''], $select1 = [''], $id){
		return $this->innerjoin(self::TABLE, self::TABLE_ORDER, $select, $select1, $id);
	}
	public function selectTripleJoin($select = [''], $select1 = [''], $select2 = [''], $id, $id1){
		return $this->triplejoin(self::TABLE_ACCOUNT_ROLE, self::TABLE_ROLE, self::TABLE, $select, $select1, $select2, $id, $id1);
	}
	public function selectTripleJoinPaging($select = [''], $select1 = [''], $select2 = [''], $id, $id1, $limit, $page){
		return $this->triplejoinPaging(self::TABLE_ACCOUNT_ROLE, self::TABLE_ROLE, self::TABLE, $select, $select1, $select2, $id, $id1, $limit, $page);
	}
	public function selectTripleJoinById($select = [''], $select1 = [''], $select2 = [''], $id, $id1, $id_account){
		return $this->triplejoinById(self::TABLE_ACCOUNT_ROLE, self::TABLE_ROLE, self::TABLE, $select, $select1, $select2, $id, $id1, $id_account);
	}
	public function selectByName($column, $s = ''){
		return $this->find(self::TABLE, $column, $s);
	}
	public function selectAccountById($id){
		return $this->selectById(self::TABLE, $id);
	} 
	public function insertAccount($select = [''], $data = ['']){
		return $this->insert(self::TABLE, $select, $data);
	}
	public function insertAccount_Role($select = [''], $data = ['']){
		return $this->insert(self::TABLE_ACCOUNT_ROLE, $select, $data);
	}
	public function deleteAccountById($id){
		return $this->delete(self::TABLE, $id);
	}
	public function deleteAccountRoleById($select, $id, $select1, $id1){
		return $this->deleteLink(self::TABLE_ACCOUNT_ROLE, $select, $id, $select1, $id1);
	}
	public function updateAccount($select = [''], $data = [''], $id){
		return $this->update(self::TABLE, $select ,$data ,$id);
	}
	public function updateAccount_Role($selectColumn, $selectColumn1, $select = [''], $data = [''], $id, $id1)
	{
		return $this->updateAccRole(self::TABLE_ACCOUNT_ROLE,$selectColumn, $selectColumn1, $select, $data, $id, $id1);
	}
	public function checkAccount($select = [], $select1 = [], $id, $username, $password){
		return $this->check(self::TABLE, self::TABLE_ACCOUNT_ROLE, $select, $select1
			, $id, $username, $password);
	}
}