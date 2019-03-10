//讀取資料庫資料
LoadData("php/Object/ObjectStockChanged.php", "TableInfo", GetData, "class=1");
//讀取資料庫資料
LoadData("php/Tenant/Action/Getdata/SearchAttributeGetdata.php", "SelectSearchAttribute", SelectonGetData, "TableName="+"equipment_change");
//Textarea編輯
TextareaEditSendData("TableInfo", "php/Object/Action/Update/ObjectStockChangedUpdata.php", GetData, "class=1");
//Insert function Modal 顯示
//LoadData("php/Object/ModalShow/ObjectStockChangedInsert.php", "ModalInsert", GetData, "class=1");
//select編輯
SelectEditSendData("TableInfo", "php/Object/Action/Update/ObjectStockChangedUpdata.php", GetData, "class=1");
//Input編輯
InputEditSendData("TableInfo", "php/Object/Action/Update/ObjectStockChangedUpdata.php", GetData, "class=1");
//開啟Iput tag 輸入功能
InputEdit("ModalInsert");
//取消按鍵清除Input tag的value
BtnCancel("BtnCancel","ModalInsert");
//Insert 按鍵功能
BtnInsert("BtnConfirmInsert", "ModalInsert","php/Tenant/Action/Insert/FunctionInsert.php");

BtnInsertModal("BtnInsertModal", "ModalInsert", "php/Object/ModalShow/ObjectStockChangedInsert.php");

BtnDeleteModal("BtnDeleteModal", "TableInfo", "ModalDelete", "php/Tenant/ModalShow/ModalShowDelte.php","change_id");

BtnConfirmDelete("BtnConfirmDelete", "TableInfo", "DivModalDelete", "php/Tenant/Action/Delete/TenantInfoDelete.php","change_id");

BtnSearch("BtnSearch", "InputSearch", "SelectSearchAttribute", "equipment_change", "TableInfo", "php/Object/Action/Search/ObjectStockChangedSearch.php");