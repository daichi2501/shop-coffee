<?php
class CategoryModel extends BaseModel
{
	const TABLE = 'category';

	public function selectAllCategory($select = ['*'], $orderBys=[]){
		return $this->select(self::TABLE, $select, $orderBys);
	}
	public function selectByName($column, $s = ''){
		return $this->find(self::TABLE, $column, $s);
	}
	public function selectCategoryById($id){
		return $this->selectById(self::TABLE, $id);
	}
	public function paging($limit, $page){
		return $this->pagination(self::TABLE, $limit, $page);
	}
	public function insertCategory($select = [''], $data = ['']){
		return $this->insert(self::TABLE, $select, $data);
	}
	public function deleteCategoryById($id){
		return $this->delete(self::TABLE, $id);
	}
	public function updateCategory($select = [''], $data = [''], $id){
		return $this->update(self::TABLE, $select, $data, $id);
	}
}