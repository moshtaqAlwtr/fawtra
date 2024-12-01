 var url = window.location.pathname;
 var myPageName = url.substring(url.lastIndexOf('/') + 1);



 switch (myPageName.toLocaleLowerCase()) {

     //MainDefTree
     case 'StoresBranches_grid.aspx'.toLocaleLowerCase():
     case 'StoresBranches_form.aspx'.toLocaleLowerCase():
         $('#LiBranches').addClass("active");
         $('#MainDefTree').addClass("active");
         break;
     case 'Home.aspx'.toLocaleLowerCase():
         $('#Li_Home').addClass("active");
         break;
     case 'stores_grid.aspx'.toLocaleLowerCase():
     case 'stores_form.aspx'.toLocaleLowerCase():
         $('#LiStores').addClass("active");
         $('#MainDefTree').addClass("active");
         break;
     case 'itemCategories_grid.aspx'.toLocaleLowerCase():
     case 'itemCategories_form.aspx'.toLocaleLowerCase():
         $('#LiItemCat').addClass("active");
         $('#MainDefTree').addClass("active");
         break;
     case 'items_grid.aspx'.toLocaleLowerCase():
     case 'items_form2.aspx'.toLocaleLowerCase():
         $('#LiItemsForm').addClass("active");
         $('#MainDefTree').addClass("active");
         break;
     case 'CategoriesTree.aspx'.toLocaleLowerCase():
         $('#LiItemsTree').addClass("active");
         $('#MainDefTree').addClass("active");
         break;
     case 'itemTab3_form.aspx'.toLocaleLowerCase():
         $('#liTab3').addClass("active");
         $('#MainDefTree').addClass("active");
         break;
     case 'items_Components.aspx'.toLocaleLowerCase():
         $('#LitItemComponents').addClass("active");
         $('#MainDefTree').addClass("active");
         break;
     case 'customersGrid.aspx'.toLocaleLowerCase():
         $('#LiCustomers').addClass("active");
         $('#MainDefTree').addClass("active");
         break;
     case 'customers.aspx'.toLocaleLowerCase():
         $('#LiCustomers').addClass("active");
         $('#MainDefTree').addClass("active");
         break;
     case 'vendorsGrid.aspx'.toLocaleLowerCase():
         $('#LiVendors').addClass("active");
         $('#MainDefTree').addClass("active");
         break;
     case 'vendors.aspx'.toLocaleLowerCase():
         $('#LiVendors').addClass("active");
         $('#MainDefTree').addClass("active");
         break;
     case 'rep.aspx'.toLocaleLowerCase():
         $('#LitRepDefinition').addClass("active");
         $('#MainDefTree').addClass("active");
         break;
     case 'Bank_grid.aspx'.toLocaleLowerCase():
         $('#liBankGrid').addClass("active");
         $('#MainDefTree').addClass("active");
         break;

     case 'SellersGrid.aspx'.toLocaleLowerCase():
     case 'Sellers.aspx'.toLocaleLowerCase():
         $('#LiSellers').addClass("active");
         $('#MainDefTree').addClass("active");
         break;

     case 'ResturantDrivers.aspx'.toLocaleLowerCase():
         $('#TreeResturant').addClass("active");
         $('#MainDefTree').addClass("active");
         $('#litRestaurantDrivers').addClass("active");

         break;
     case 'Waiters.aspx'.toLocaleLowerCase():
         $('#TreeResturant').addClass("active");
         $('#LitWaiters').addClass("active");
         $('#litRestaurantDrivers').addClass("active");
         break;
     case 'RestaurantDesks.aspx'.toLocaleLowerCase():
         $('#TreeResturant').addClass("active");
         $('#LitRestaurantDesks').addClass("active");
         $('#litRestaurantDrivers').addClass("active");
         break;
     case 'WaiterDesks.aspx'.toLocaleLowerCase():
         $('#TreeResturant').addClass("active");
         $('#LitWaiterDesks').addClass("active");
         $('#litRestaurantDrivers').addClass("active");
         break;
         //=======================================InvoicesTree=========================================
         //

     case 'BirdsSellInvoice.aspx'.toLocaleLowerCase():
         $('#liSellInvoiceBirds').addClass("active");
         $('#InvoicesTree').addClass("active");
         break;
     case 'MasarefeSellInvoice.aspx'.toLocaleLowerCase():
         $('#MasarefeSellInvoice').addClass("active");
         $('#InvoicesTree').addClass("active");
         break;

     case 'SellOrderGrid.aspx'.toLocaleLowerCase():
     case 'sellOrder.aspx'.toLocaleLowerCase():

         $('#LisellOrder').addClass("active");
         $('#InvoicesTree').addClass("active");
         break;

     case 'SellInvoiceGrid.aspx'.toLocaleLowerCase():
     case 'SellInvoice.aspx'.toLocaleLowerCase():

         $('#litSellInvoice').addClass("active");
         $('#InvoicesTree').addClass("active");
         break;

     case 'SellBackbirdsInvoice.aspx'.toLocaleLowerCase():
         $('#liSellBackBirdsInvoice').addClass("active");
         $('#InvoicesTree').addClass("active");
         break;

     case 'SellbackInvoiceGrid.aspx'.toLocaleLowerCase():
     case 'SellBackInvoice.aspx'.toLocaleLowerCase():
         $('#LiSellBackInvoice').addClass("active");
         $('#InvoicesTree').addClass("active");
         break;
     case 'Restaurant_Invoice.aspx'.toLocaleLowerCase():
         $('#litRestauranInvoice').addClass("active");
         $('#InvoicesTree').addClass("active");
         break;

     case 'BirdsbuyInvoice.aspx'.toLocaleLowerCase():
         $('#LiBirdsBuyInvoice').addClass("active");
         $('#InvoicesTree').addClass("active");
         break;



     case 'BuyInvoiceGrid.aspx'.toLocaleLowerCase():
     case 'buyInvoice.aspx'.toLocaleLowerCase():
         $('#LiBuyInvoice').addClass("active");
         $('#InvoicesTree').addClass("active");
         break;

     case 'BirdsBuybackInvoice.aspx'.toLocaleLowerCase():
         $('#LiBirdsBuybackInvoice').addClass("active");
         $('#InvoicesTree').addClass("active");
         break;

     case 'BuybackInvoiceGrid.aspx'.toLocaleLowerCase():
     case 'BuybackInvoice.aspx'.toLocaleLowerCase():
         $('#LiBuybackInvoice').addClass("active");
         $('#InvoicesTree').addClass("active");
         break;
     case 'CashierSellInvoice.aspx'.toLocaleLowerCase():
         $('#LiCashierSellInvoice').addClass("active");
         $('#InvoicesTree').addClass("active");
         break;
     case 'SellOrderGrid.aspx'.toLocaleLowerCase():
     case 'sellOrder.aspx'.toLocaleLowerCase():
         $('#LitsellOrder').addClass("active");
         $('#InvoicesTree').addClass("active");
         break;
     case 'invoicesMove.aspx'.toLocaleLowerCase():
         $('#LiInvoicesMove').addClass("active");
         $('#InvoicesTree').addClass("active");
         $('#InvoicesRepot').addClass("active");

         break;
     case 'InvoiceReport.aspx'.toLocaleLowerCase():
         $('#LitInvoiceReport').addClass("active");
         $('#InvoicesTree').addClass("active");
         $('#InvoicesRepot').addClass("active");

         break;
     case 'ResturantDailySalesForItems.aspx'.toLocaleLowerCase():
         $('#LitResturantDailySalesForItems').addClass("active");
         $('#InvoicesTree').addClass("active");
         break;
     case 'ResturantItemsProfit.aspx'.toLocaleLowerCase():
         $('#LitResturantItemProfit').addClass("active");
         $('#InvoicesTree').addClass("active");
         break;
     case 'ItemsSale.aspx'.toLocaleLowerCase():
         $('#LiItemSale').addClass("active");
         $('#InvoicesTree').addClass("active");
         break;
     case 'InvoicesTrash.aspx'.toLocaleLowerCase():
         $('#LiInvoicesTrash').addClass("active");
         $('#InvoicesTree').addClass("active");
         break;
     case 'ItemsSaleGrid.aspx'.toLocaleLowerCase():
         $('#LiItemSaleGrid').addClass("active");
         $('#InvoicesTree').addClass("active");
         break;
         //-===================================Booking===============================================

     case 'BookedSellInvoice.aspx'.toLocaleLowerCase():
         $('#LiBookedSellInvoice').addClass("active");
         $('#LitBooking').addClass("active");
         break;

     case 'TotalBookingStore.aspx'.toLocaleLowerCase():
         $('#LiTotalBookingStore').addClass("active");
         $('#LitBooking').addClass("active");
         break;
     case 'BookedSellingItems.aspx'.toLocaleLowerCase():
         $('#LiBookedSellingItems').addClass("active");
         $('#LitBooking').addClass("active");
         break;
         //-===================================Stores=========================================================
     case 'LastTotalStores.aspx'.toLocaleLowerCase():
         $('#LiLastTotalStores').addClass("active");
         $('#StoresTree').addClass("active");
         break;
     case 'StoreMoveInPeriod.aspx'.toLocaleLowerCase():
         $('#LitStoreMoveInPeriod').addClass("active");
         $('#StoresTree').addClass("active");
         break;
     case 'TotalStoresByPrice.aspx'.toLocaleLowerCase():
         $('#LiTotalStoresByPrice').addClass("active");
         $('#StoresTree').addClass("active");
         break;

     case 'OfflineTotalStores.aspx'.toLocaleLowerCase():
         $('#LiOfflineTotalStores').addClass("active");
         $('#StoresTree').addClass("active");
         break;

     case 'StoresMove.aspx'.toLocaleLowerCase():
         $('#LiStoresMove').addClass("active");
         $('#StoresTree').addClass("active");
         break;

     case 'ItemsProfit.aspx'.toLocaleLowerCase():
         $('#LiTotalStoresMove').addClass("active");
         $('#StoresTree').addClass("active");
         break;
     case 'TotalItemsSales.aspx'.toLocaleLowerCase():
         $('#li_TotalItemsSales').addClass("active");
         $('#StoresTree').addClass("active");
         break;
     case 'InventoryGrid.aspx'.toLocaleLowerCase():
     case 'inventory.aspx'.toLocaleLowerCase():
         $('#LiInventory').addClass("active");
         $('#StoresTree').addClass("active");
         break;

     case 'Items_Manufacture.aspx'.toLocaleLowerCase():
         $('#LitItemManufature').addClass("active");
         $('#StoresTree').addClass("active");
         $('#LitManufature').addClass("active");
         break;

     case 'Items_Manufacture_grid.aspx'.toLocaleLowerCase():
         $('#LitManufatureGrid').addClass("active");
         $('#StoresTree').addClass("active");
         $('#LitManufature').addClass("active");
         break;

     case 'ManufacturingOrderGrid.aspx'.toLocaleLowerCase():
     case 'ManufacturingOrder.aspx'.toLocaleLowerCase():
         $('#LiManufacturingOrder').addClass("active");
         $('#StoresTree').addClass("active");
         $('#TreeDocs').addClass("active");
         break;

     case 'StoresAddGrid.aspx'.toLocaleLowerCase():
     case 'stores_add.aspx'.toLocaleLowerCase():
         $('#LiStores_add').addClass("active");
         $('#StoresTree').addClass("active");
         $('#TreeDocs').addClass("active");
         break;

     case 'StoresSubGrid.aspx'.toLocaleLowerCase():
     case 'stores_sub.aspx'.toLocaleLowerCase():
         $('#LiStores_sub').addClass("active");
         $('#StoresTree').addClass("active");
         $('#TreeDocs').addClass("active");
         break;
     case 'Item_Receiving.aspx'.toLocaleLowerCase():
         $('#LiItemReceiving').addClass("active");
         $('#StoresTree').addClass("active");
         $('#TreeDocs').addClass("active");
         break;

     case 'StoresTransferGrid.aspx'.toLocaleLowerCase():
     case 'stores_transfer.aspx'.toLocaleLowerCase():
         $('#LiStores_transfer').addClass("active");
         $('#StoresTree').addClass("active");
         $('#TreeDocs').addClass("active");
         break;

     case 'storestransferBranchesGrid.aspx'.toLocaleLowerCase():
     case 'stores_transfer_Branches.aspx'.toLocaleLowerCase():
         $('#LiStores_transfer_Branches').addClass("active");
         $('#StoresTree').addClass("active");
         $('#TreeDocs').addClass("active");
         break;

     case 'stores_transfer_Branches_OneMove.aspx'.toLocaleLowerCase():
         $('#LiStores_transfer_Branches_OneMove').addClass("active");
         $('#StoresTree').addClass("active");
         $('#TreeDocs').addClass("active");
         break;

     case 'Items_BarCodeForm.aspx'.toLocaleLowerCase():
         $('#LiItems_BarCodeForm').addClass("active");
         $('#StoresTree').addClass("active");
         break;
     case 'RequiredItems.aspx'.toLocaleLowerCase():
         $('#LiRequiredItems').addClass("active");
         $('#StoresTree').addClass("active");
         break;
     case 'LazyItems.aspx'.toLocaleLowerCase():
         $('#LiLazyItems').addClass("active");
         $('#StoresTree').addClass("active");
         break;
     case 'safe_payment.aspx'.toLocaleLowerCase():
         $('#LiSafe_payment').addClass("active");
         $('#LitSafe').addClass("active");
         break;
     case 'Safe_Move.aspx'.toLocaleLowerCase():
         $('#LiSafe_Move').addClass("active");
         $('#LitSafe').addClass("active");
         break;
     case 'Safe_Move_report.aspx'.toLocaleLowerCase():
         $('#LiSafe_Move_report').addClass("active");
         $('#LitSafe').addClass("active");
         break;
     case 'ProfitGrid.aspx'.toLocaleLowerCase():
         $('#LiProfitGrid').addClass("active");
         $('#LitSafe').addClass("active");
         break;
     case 'SalesManItemsProfit.aspx'.toLocaleLowerCase():
         $('#LiSalesManItemsProfitValue').addClass("active");
         $('#LiUsersTree').addClass("active");
         $('#SellersTree').addClass("active");
         break;
     case 'SalesManItemsProfitPay.aspx'.toLocaleLowerCase():
         $('#LiSalesManItemsProfit').addClass("active");
         $('#LiUsersTree').addClass("active");
         $('#SellersTree').addClass("active");
         break;
     case 'SellersSalary.aspx'.toLocaleLowerCase():
         $('#LitSellersSalary').addClass("active");
         $('#LiUsersTree').addClass("active");
         $('#SellersTree').addClass("active");
         break;
         //---=========================================Budjet==============================================
     case 'AccountingTree.aspx'.toLocaleLowerCase():
         $('#LiAccountingTree').addClass("active");
         $('#liBudjet').addClass("active");
         break;
     case 'BasicAccontTreeCodes.aspx'.toLocaleLowerCase():
         $('#LiBasicAccontTreeCodes').addClass("active");
         $('#liBudjet').addClass("active");
         break;
     case 'Guide_accounts.aspx'.toLocaleLowerCase():
         $('#LiGuide_accounts').addClass("active");
         $('#liBudjet').addClass("active");
         break;
     case 'Daily.aspx'.toLocaleLowerCase():
         $('#LiDaily').addClass("active");
         $('#liBudjet').addClass("active");
         break;

     case 'DailyGrid.aspx'.toLocaleLowerCase():
         $('#LiDailyGrid').addClass("active");
         $('#liBudjet').addClass("active");
         break;

     case 'BudgetCustomersPayment.aspx'.toLocaleLowerCase():
         $('#LiBudgetCustomersPayment').addClass("active");
         $('#liBudjet').addClass("active");
         break;
     case 'BudgetVendorsPayment.aspx'.toLocaleLowerCase():
         $('#LiBudgetVendorsPayment').addClass("active");
         $('#liBudjet').addClass("active");
         break;

     case 'Ledger.aspx'.toLocaleLowerCase():
         $('#LiLedger').addClass("active");
         $('#liBudjet').addClass("active");
         break;

     case 'TrialBalanceGrid.aspx'.toLocaleLowerCase():
         $('#LiTrialBalanceGrid').addClass("active");
         $('#liBudjet').addClass("active");
         break;
     case 'Trading_account.aspx'.toLocaleLowerCase():
         $('#LiTrading_account').addClass("active");
         $('#liBudjet').addClass("active");
         break;
     case 'Profitloss_account.aspx'.toLocaleLowerCase():
         $('#LiProfitloss_account').addClass("active");
         $('#liBudjet').addClass("active");
         break;

     case 'BudgetGrid.aspx'.toLocaleLowerCase():
         $('#LiBudgetGrid').addClass("active");
         $('#liBudjet').addClass("active");
         break;
         //===============================Customers=====================================
     case 'customers_payment.aspx'.toLocaleLowerCase():
         $('#LitCustomerPayment').addClass("active");
         $('#LiCustomersTree').addClass("active");
         break;

     case 'TotalCustomerAccountDetailsInMonths.aspx'.toLocaleLowerCase():
         $('#LiCustomersTree').addClass("active");
         $('#li_TotalCustomerAccountDetailsInMonths').addClass("active");
         break;
     case 'TotalCustomerGeneralBalanceInMonths.aspx'.toLocaleLowerCase():
         $('#LiCustomersTree').addClass("active");
         $('#li_TotalCustomerGeneralBalanceInMonths').addClass("active");
         break;

     case 'CustomersAccounts.aspx'.toLocaleLowerCase():
         $('#CustomersAccounts').addClass("active");
         $('#LiCustomersTree').addClass("active");
         break;
     case 'TotalCustomerAccountDetails.aspx'.toLocaleLowerCase():
         $('#TotalCustomerAccountDetails').addClass("active");
         $('#LiCustomersTree').addClass("active");
         break;
     case 'TotalCustomerAccountDetailsInPeriod.aspx'.toLocaleLowerCase():
         $('#TotalCustomerAccountDetailsInPeriod').addClass("active");
         $('#LiCustomersTree').addClass("active");
         break;
     case 'Customer_Prices.aspx'.toLocaleLowerCase():
         $('#Customer_Prices').addClass("active");
         $('#LiCustomersTree').addClass("active");
         break;
     case 'InvoicePayments.aspx'.toLocaleLowerCase():
         $('#LitSellInvoicePayment').addClass("active");
         $('#LiCustomersTree').addClass("active");
         break;
     case 'CustomersGroups.aspx'.toLocaleLowerCase():
         $('#LiCustomersGroups').addClass("active");
         $('#LiCustomersTree').addClass("active");
         break;
     case 'DiscountsGrid.aspx'.toLocaleLowerCase():
     case 'Discounts.aspx'.toLocaleLowerCase():
         $('#Discounts').addClass("active");
         $('#LiCustomersTree').addClass("active");
         break;
         //-==============================================================================
     case 'vendors_payment.aspx'.toLocaleLowerCase():
         $('#LitVendorPayment').addClass("active");
         $('#LiVendorsTree').addClass("active");
         break;
     case 'vendorsAccounts.aspx'.toLocaleLowerCase():
         $('#LivendorsAccounts').addClass("active");
         $('#LiVendorsTree').addClass("active");
         break;
     case 'TotalVendoresAccountDetails.aspx'.toLocaleLowerCase():
         $('#LiTotalVendoresAccountDetails').addClass("active");
         $('#LiVendorsTree').addClass("active");
         break;
     case 'VendorDiscounts.aspx'.toLocaleLowerCase():
         $('#LiVendorDiscounts').addClass("active");
         $('#LiVendorsTree').addClass("active");
         break;
     case 'PersonsGroups.aspx'.toLocaleLowerCase():
         $('#LiVendorGroups').addClass("active");
         $('#LiVendorsTree').addClass("active");
         break;
         //-======================================================================
     case 'Recieve_paper.aspx'.toLocaleLowerCase():
         $('#LiRecieve_paperPage').addClass("active");
         $('#LiReceivePaper').addClass("active");
         break;
     case 'RecievePaperGrid.aspx'.toLocaleLowerCase():
         $('#LiRecievePaperGrid').addClass("active");
         $('#LiReceivePaper').addClass("active");
         break;
     case 'HafzaPaperGrid.aspx'.toLocaleLowerCase():
         $('#LiHafzaPaperGrid').addClass("active");
         $('#LiReceivePaper').addClass("active");
         break;
         //======================================================================
     case 'pay_paper.aspx'.toLocaleLowerCase():
         $('#Lipay_paperPage').addClass("active");
         $('#LiPayPaper').addClass("active");
         break;
     case 'PayPaperGrid.aspx'.toLocaleLowerCase():
         $('#LiPayPaperGrid').addClass("active");
         $('#LiPayPaper').addClass("active");
         break;
         //==============================================================================
     case 'BankAccount.aspx'.toLocaleLowerCase():
         $('#LiBankAccount').addClass("active");
         $('#LiBanks').addClass("active");
         break;
     case 'BankAccountGrid.aspx'.toLocaleLowerCase():
         $('#LiBankAccountGrid').addClass("active");
         $('#LiBanks').addClass("active");
         break;
         //-=============================================================================
     case 'Rep_ReceiveItems.aspx'.toLocaleLowerCase():
         $('#LiRep_ReceiveItems').addClass("active");
         $('#liRep').addClass("active");
         break;
     case 'RepItemsProfit.aspx'.toLocaleLowerCase():
         $('#LiRepItemsProfit').addClass("active");
         $('#liRep').addClass("active");
         break;
     case 'Rep_supplyingItemsGrid.aspx'.toLocaleLowerCase():
     case 'Rep_supplyingItems.aspx'.toLocaleLowerCase():
         $('#LiRep_supplyingItems').addClass("active");
         $('#liRep').addClass("active");
         break;
     case 'Rep_ItemsTransfereGrid.aspx'.toLocaleLowerCase():
     case 'Rep_ItemsTransfere.aspx'.toLocaleLowerCase():
         $('#LiRep_ItemsTransfere').addClass("active");
         $('#liRep').addClass("active");
         break;
     case 'RepMove.aspx'.toLocaleLowerCase():
         $('#LiRepMove').addClass("active");
         $('#liRep').addClass("active");
         break;
     case 'TotalRep.aspx'.toLocaleLowerCase():
         $('#LiTotalRep').addClass("active");
         $('#liRep').addClass("active");
         break;
     case 'RepAccounts.aspx'.toLocaleLowerCase():
         $('#LiRepAccounts').addClass("active");
         $('#liRep').addClass("active");
         break;
     case 'RepItemsProfitGrid.aspx'.toLocaleLowerCase():
         $('#LiRepItemsProfitGrid').addClass("active");
         $('#liRep').addClass("active");
         break;
     case 'RepSalary.aspx'.toLocaleLowerCase():
         $('#LiRepSalary').addClass("active");
         $('#liRep').addClass("active");
         break;

         //-=================================================================
     case 'users_grid.aspx'.toLocaleLowerCase():
         $('#LiUsers').addClass("active");
         $('#LiUsersTree').addClass("active");
         break;
     case 'change_account.aspx'.toLocaleLowerCase():
         $('#Lichange_account').addClass("active");
         $('#LiUsersTree').addClass("active");
         break;
     case 'UsersPermissions.aspx'.toLocaleLowerCase():
         $('#LiPermission').addClass("active");
         $('#LiUsersTree').addClass("active");
         break;
     case 'ResturantUserSales.aspx'.toLocaleLowerCase():
         $('#Li_UserSales').addClass("active");
         $('#LiUsersTree').addClass("active");
         break;
         //========================================================================================

     case 'UserSales.aspx'.toLocaleLowerCase():
         $('#Li_UserSales').addClass("active");
         $('#LiUsersTree').addClass("active");
         break;

     case 'company_info.aspx'.toLocaleLowerCase():
         $('#Licompany_info').addClass("active");
         $('#LiManagmentTree').addClass("active");
         break;
     case 'itemsFromExcel.aspx'.toLocaleLowerCase():
         $('#liItemsFromExcel').addClass("active");
         $('#LiManagmentTree').addClass("active");
         break;
     case 'ResetData.aspx'.toLocaleLowerCase():
         $('#liRestData').addClass("active");
         $('#LiManagmentTree').addClass("active");
         break;
     case 'DocPrintSettings.aspx'.toLocaleLowerCase():
         $('#LiReportSettings').addClass("active");
         $('#LiManagmentTree').addClass("active");
         break;
     case 'UploadOfflineData.aspx'.toLocaleLowerCase():
         $('#liOfflineData').addClass("active");
         $('#LiManagmentTree').addClass("active");
         break;
     case 'ControlItemsPrices.aspx'.toLocaleLowerCase():
         $('#liControlItemsPrices').addClass("active");
         $('#MainDefTree').addClass("active");
         break;


         //===============================المناديب=======================
     case 'Rep_ReceiveItems.aspx'.toLocaleLowerCase():
         $('#LiRep_ReceiveItems').addClass("active");
         $('#liRep').addClass("active");
         break;
     case 'RepItemsProfit.aspx'.toLocaleLowerCase():
         $('#LiRepItemsProfit').addClass("active");
         $('#liRep').addClass("active");
         break;
     case 'Rep_supplyingItems.aspx'.toLocaleLowerCase():
         $('#LiRep_supplyingItems').addClass("active");
         $('#liRep').addClass("active");
         break;
     case 'Rep_ItemsTransfere.aspx'.toLocaleLowerCase():
         $('#LiRep_ItemsTransfere').addClass("active");
         $('#liRep').addClass("active");
         break;
     case 'RepMove.aspx'.toLocaleLowerCase():
         $('#LiRepMove').addClass("active");
         $('#liRep').addClass("active");
         break;
     case 'TotalRep.aspx'.toLocaleLowerCase():
         $('#LiTotalRep').addClass("active");
         $('#liRep').addClass("active");
         break;
     case 'RepAccounts.aspx'.toLocaleLowerCase():
         $('#LiRepAccounts').addClass("active");
         $('#liRep').addClass("active");
         break;
     case 'RepItemsProfitGrid.aspx'.toLocaleLowerCase():
         $('#LiRepItemsProfitGrid').addClass("active");
         $('#liRep').addClass("active");
         break;
     case 'RepSalary.aspx'.toLocaleLowerCase():
         $('#LiRepSalary').addClass("active");
         $('#liRep').addClass("active");
         break;
 }

 //var MenuToggle = $('#_Lit_MenuToggle').val();
 //if (MenuToggle == 'Open') {
 //    $('#MenuStatus').removeClass("sidebar-collapse");
 //} else {
 //    $('#MenuStatus').addClass("sidebar-collapse");
 //}