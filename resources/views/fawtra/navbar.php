<div class="header">
        <button id="toggleSidebarBtn" class="toggle-sidebar-btn">☰</button>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav flex-row">
                <li id="ctl00_lnk_lang" data-toggle="tooltip" data-placement="right" title="">
                    <a id="ctl00_btn_Lang" tabindex="-1" title="English" data-toggle="tooltip" data-placement="right" title="Arabic" href="javascript:__doPostBack(&#39;ctl00$btn_Lang&#39;,&#39;&#39;)">                             <i>
                        <img src="Design/images/ar.png"   class="languages" alt=""></i>                                </a>
                </li>


                <li><a tabindex="-1" href="managment/logout.aspx?Lock=True" title="Lock Screen"><i class="fa fa-lock"></i></a></li>
                <li><a tabindex="-1" href="#" class="fullscreen"><i class="fa fa-arrows-alt"></i></a></li>
                <li class="dropdown Categories-menu" data-toggle="tooltip" data-placement="right">
                    <a tabindex="-1" href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="fa fa-th"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="Invoices/SellInvoice.aspx" id="ctl00_li_DropMenuSellInvoice" class="dropdown-item" tabindex="-1">
                                <i class="fa fa-list-alt"></i>
                                <span>
                                    فواتير البيع</span></a>
                        </li>
                        <li>
                            <a href="Invoices/SellBackInvoice.aspx" id="ctl00_li_DropMenuSellBackInvoice" class="dropdown-item" tabindex="-1">
                                <i class="fa fa-cogs"></i>
                                <span>
                                    مرتجع البيع</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" tabindex="-1" href="Customers/customersGrid.aspx">
                                <i class="fa fa-group"></i>
                                <span>
                                    العملاء</span>
                            </a>
                        </li>
                        <li>
                            <a href="Invoices/buyInvoiceGrid.aspx" id="ctl00_li_DropMenuBuyInvoice" class="dropdown-item" tabindex="-1">
                                <i class="fa fa-list-alt"></i>
                                <span>
                                    فواتير الشراء</span>
                            </a>
                        </li>
                        <li>
                            <a href="Invoices/BuybackInvoice.aspx" id="ctl00_li_DropMenuBuyBackInvoice" class="dropdown-item" tabindex="-1">
                                <i class="fa fa-list-alt"></i>
                                <span>
                                    مرتجع الشراء</span>
                            </a>
                        </li>
                        <li>
                            <a href="Vendors/vendorsGrid.aspx" id="ctl00_li_DropMenuVendor" class="dropdown-item" tabindex="-1">
                                <i class="fa fa-group"></i>
                                <span>
                                    الموردين</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" tabindex="-1" href="Stores/items_grid.aspx">
                                <i class="fa fa-align-justify"></i>
                                <span>
                                    الاصناف</span>
                            </a>
                        </li>
                        <li>
                            <a href="Stores/LastTotalStores.aspx" id="ctl00_li_LastTotalStores" class="dropdown-item" tabindex="-1">
                                <i class="fa fa-align-justify"></i>
                                <span>
                                    رصيد المخزن</span>
                            </a>
                        </li>
                        <li>
                            <a href="Stores/RequiredItems.aspx" id="ctl00_li_RequiredItems" class="dropdown-item" tabindex="-1">
                                <i class="fa fa-align-justify"></i>
                                <span>
                                    حد الطلب</span>
                            </a>
                        </li>
                        <li>
                            <a    class="dropdown-item" tabindex="-1" href="invoices/SellOrderGrid.aspx">
                                <i class="fa fa-picture-o"></i>
                                <span>
                                    عرض أسعار</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" tabindex="-1" href="managment/users_grid.aspx">
                                <i class="fa fa-group"></i>
                                <span>
                                    المستخدمين</span>
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item" tabindex="-1" href="managment/company_info.aspx">
                                <i class="fa fa-cogs"></i>
                                <span>
                                    اعدادات عامة</span>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="dropdown user user-menu">
                    <a tabindex="-1" href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                        <img src="Design/Images/avatar5.png" class="user-image" alt="">
                        <span class="hidden-xs">
                            admin
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <img src="Design/Images/avatar5.png" class="img-circle" alt="">
                            <p>
                                admin
                            </p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-left"><a tabindex="-1" href="managment/change_account.aspx" class="btn btn-flat"><i class="fa fa-user"></i>&nbsp;&nbsp;تعديل</a></div>
                            <div class="pull-right"><a tabindex="-1" href="managment/logout.aspx" class="btn btn-flat"><i class="fa fa-sign-out"></i>&nbsp;&nbsp;خروج</a></div>
                        </li>
                    </ul>
                </li>

                <li class="dropdown settings-menu" data-toggle="tooltip" data-placement="right" title="">
                    <a tabindex="-1" href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="fa fa-cogs"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" tabindex="-1" href="managment/company_info.aspx"><i class="fa fa-wrench"></i>&nbsp;&nbsp;إعدادات النظام</a></li>
                        <li><a class="dropdown-item" tabindex="-1" href="managment/change_account.aspx"><i class="fa fa-user"></i>&nbsp;&nbsp;تغير كلمة المرور </a></li>
                        <li><a class="dropdown-item" tabindex="-1" href="managment/RefreshCashierData.aspx"><i class="fa fa-refresh"></i>&nbsp;&nbsp;تحديث بيانات نقاط البيع</a></li>

                        <li><a tabindex="-1" href="managment/logout.aspx"><i class="fa fa-sign-out"></i>&nbsp;&nbsp;تسجيل خروج</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- الشريط العلوي -->
        <nav class="navbar navbar-static-top" role="navigation">
                    
        <asp:LinkButton TabIndex="-1" ClientIDMode="Static" ID="btn_MenuToggle" CausesValidation="false" data-toggle="offcanvas"
            Class="sidebar-toggle">
             <span class="sr-only"></span>
        </asp:LinkButton>

        <input type="hidden" name="ctl00$_Lit_MenuToggle" id="_Lit_MenuToggle" value="Open" />

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav flex-row">
                <li id="ctl00_lnk_lang" data-toggle="tooltip" data-placement="right" title="">
                    <a id="ctl00_btn_Lang" tabindex="-1" title="English" data-toggle="tooltip" data-placement="right" title="Arabic" href="javascript:__doPostBack(&#39;ctl00$btn_Lang&#39;,&#39;&#39;)">                             <i>
                        <img src="Design/images/ar.png"   class="languages" alt=""></i>                                </a>
                </li>


                <li><a tabindex="-1" href="managment/logout.aspx?Lock=True" title="Lock Screen"><i class="fa fa-lock"></i></a></li>
                <li><a tabindex="-1" href="#" class="fullscreen"><i class="fa fa-arrows-alt"></i></a></li>
                <li class="dropdown Categories-menu" data-toggle="tooltip" data-placement="right">
                    <a tabindex="-1" href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="fa fa-th"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="Invoices/SellInvoice.aspx" id="ctl00_li_DropMenuSellInvoice" class="dropdown-item" tabindex="-1">
                                <i class="fa fa-list-alt"></i>
                                <span>
                                    فواتير البيع</span></a>
                        </li>
                        <li>
                            <a href="Invoices/SellBackInvoice.aspx" id="ctl00_li_DropMenuSellBackInvoice" class="dropdown-item" tabindex="-1">
                                <i class="fa fa-cogs"></i>
                                <span>
                                    مرتجع البيع</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" tabindex="-1" href="Customers/customersGrid.aspx">
                                <i class="fa fa-group"></i>
                                <span>
                                    العملاء</span>
                            </a>
                        </li>
                        <li>
                            <a href="Invoices/buyInvoiceGrid.aspx" id="ctl00_li_DropMenuBuyInvoice" class="dropdown-item" tabindex="-1">
                                <i class="fa fa-list-alt"></i>
                                <span>
                                    فواتير الشراء</span>
                            </a>
                        </li>
                        <li>
                            <a href="Invoices/BuybackInvoice.aspx" id="ctl00_li_DropMenuBuyBackInvoice" class="dropdown-item" tabindex="-1">
                                <i class="fa fa-list-alt"></i>
                                <span>
                                    مرتجع الشراء</span>
                            </a>
                        </li>
                        <li>
                            <a href="Vendors/vendorsGrid.aspx" id="ctl00_li_DropMenuVendor" class="dropdown-item" tabindex="-1">
                                <i class="fa fa-group"></i>
                                <span>
                                    الموردين</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" tabindex="-1" href="Stores/items_grid.aspx">
                                <i class="fa fa-align-justify"></i>
                                <span>
                                    الاصناف</span>
                            </a>
                        </li>
                        <li>
                            <a href="Stores/LastTotalStores.aspx" id="ctl00_li_LastTotalStores" class="dropdown-item" tabindex="-1">
                                <i class="fa fa-align-justify"></i>
                                <span>
                                    رصيد المخزن</span>
                            </a>
                        </li>
                        <li>
                            <a href="Stores/RequiredItems.aspx" id="ctl00_li_RequiredItems" class="dropdown-item" tabindex="-1">
                                <i class="fa fa-align-justify"></i>
                                <span>
                                    حد الطلب</span>
                            </a>
                        </li>
                        <li>
                            <a    class="dropdown-item" tabindex="-1" href="invoices/SellOrderGrid.aspx">
                                <i class="fa fa-picture-o"></i>
                                <span>
                                    عرض أسعار</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" tabindex="-1" href="managment/users_grid.aspx">
                                <i class="fa fa-group"></i>
                                <span>
                                    المستخدمين</span>
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item" tabindex="-1" href="managment/company_info.aspx">
                                <i class="fa fa-cogs"></i>
                                <span>
                                    اعدادات عامة</span>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="dropdown user user-menu">
                    <a tabindex="-1" href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                        <img src="Design/Images/avatar5.png" class="user-image" alt="">
                        <span class="hidden-xs">
                            admin
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <img src="Design/Images/avatar5.png" class="img-circle" alt="">
                            <p>
                                admin
                            </p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-left"><a tabindex="-1" href="managment/change_account.aspx" class="btn btn-flat"><i class="fa fa-user"></i>&nbsp;&nbsp;تعديل</a></div>
                            <div class="pull-right"><a tabindex="-1" href="managment/logout.aspx" class="btn btn-flat"><i class="fa fa-sign-out"></i>&nbsp;&nbsp;خروج</a></div>
                        </li>
                    </ul>
                </li>

                <li class="dropdown settings-menu" data-toggle="tooltip" data-placement="right" title="">
                    <a tabindex="-1" href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="fa fa-cogs"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" tabindex="-1" href="managment/company_info.aspx"><i class="fa fa-wrench"></i>&nbsp;&nbsp;إعدادات النظام</a></li>
                        <li><a class="dropdown-item" tabindex="-1" href="managment/change_account.aspx"><i class="fa fa-user"></i>&nbsp;&nbsp;تغير كلمة المرور </a></li>
                        <li><a class="dropdown-item" tabindex="-1" href="managment/RefreshCashierData.aspx"><i class="fa fa-refresh"></i>&nbsp;&nbsp;تحديث بيانات نقاط البيع</a></li>

                        <li><a tabindex="-1" href="managment/logout.aspx"><i class="fa fa-sign-out"></i>&nbsp;&nbsp;تسجيل خروج</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>