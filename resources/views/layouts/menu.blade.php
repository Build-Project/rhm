                <aside class="main-sidebar">
                    <!-- sidebar: style can be found in sidebar.less -->
                    <section class="sidebar">
                        <!-- Sidebar user panel -->
                        <ul class="sidebar-menu">
                            <li id="dashboard"><a href="/"><img
                                            src="{{asset('images/Dashboard.png')}}"
                                            style="width: 16px;"> &nbsp;&nbsp;<span>Dashboard</span> </a></li>

                            <li class='treeview' id="marketing"><a href="#"><img src="{{asset('images/Marketing.png')}}"
                                            style="width: 16px;">&nbsp;&nbsp;<!-- <i class="fa fa-shopping-cart" aria-hidden="true"></i> -->
                                    <span>Marketing</span> <i class="fa fa-angle-left pull-right"></i></a>
                                <ul class="treeview-menu" id="ul_marketing">

                                    <li id="ul_li_campaign"><a
                                                href="${pageContext.request.contextPath}/list-campaigns"> <i
                                                    class='fa fa-circle-o color_menu' aria-hidden='true'
                                                    id="marketing_icon_campaign"></i> <span>Campaigns</span></a></li>

                                    <li id="ul_li_lead"><a
                                                href="${pageContext.request.contextPath}/list-leads"> <i
                                                    class='fa fa-circle-o color_menu' aria-hidden='true'
                                                    id="marketing_icon_lead"></i> <span>Leads</span>
                                        </a></li>
                                    <li id="ul_li_competitor"><a
                                                href="${pageContext.request.contextPath}/list-competitors"> <i
                                                    class='fa fa-circle-o color_menu' aria-hidden='true'
                                                    id="hbu_icon_competitor"></i> <span>Competitors</span>
                                        </a></li>
                                    <li id="ul_li_survey"><a
                                                href="${pageContext.request.contextPath}/market-survey"> <i
                                                    class='fa fa-circle-o color_menu' aria-hidden='true'
                                                    id="hbu_icon_survey"></i> <span>Market Survey</span>
                                        </a>
                                    </li>
                                    <li id="ul_li_lead_project"><a
                                                href="${pageContext.request.contextPath}/lead-project"> <i
                                                    class='fa fa-circle-o color_menu' aria-hidden='true'
                                                    id="hbu_icon_lead_project"></i> <span>Lead Project</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </section>
                </aside>
