//讀取資料庫資料
LoadData("php/Object/ObjectParking.php", "TableInfo", GetData, "class=1");
//讀取資料庫資料
LoadData("php/Tenant/Action/Getdata/SearchAttributeGetdata.php", "SelectSearchAttribute", SelectonGetData, "TableName="+"parking");
//Textarea編輯
TextareaEditSendData("TableInfo", "php/Object/Action/Update/ObjectParkingUpdata.php", GetData, "class=1");
//Insert function Modal 顯示
//LoadData("php/Object/ModalShow/ObjectParkingInsert.php", "ModalInsert", GetData, "class=1");
//select編輯
SelectEditSendData("TableInfo", "php/Object/Action/Update/ObjectParkingUpdata.php", GetData, "class=1");
//Input編輯
InputEditSendData("TableInfo", "php/Object/Action/Update/ObjectParkingUpdata.php", GetData, "class=1");
//開啟Iput tag 輸入功能
InputEdit("ModalInsert");
//取消按鍵清除Input tag的value
BtnCancel("BtnCancel","ModalInsert");
//Insert 按鍵功能
BtnInsert("BtnConfirmInsert", "ModalInsert","php/Tenant/Action/Insert/FunctionInsert.php");

BtnInsertModal("BtnInsertModal", "ModalInsert", "php/Object/ModalShow/ObjectParkingInsert.php");

BtnDeleteModal("BtnDeleteModal", "TableInfo", "ModalDelete", "php/Tenant/ModalShow/ModalShowDelte.php","parking_id");

BtnConfirmDelete("BtnConfirmDelete", "TableInfo", "DivModalDelete", "php/Tenant/Action/Delete/TenantInfoDelete.php","parking_id");

BtnSearch("BtnSearch", "InputSearch", "SelectSearchAttribute", "parking", "TableInfo", "php/Object/Action/Search/ObjectParkingSearch.php");