<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">
          <h3>General</h3>
          <ul class="nav side-menu">
            <li><a><i class="fa fa-th-list"></i> Category <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="{{route('list.category')}}">List</a></li>
                <li><a href="{{route('add.category')}}">Add</a></li>
              </ul>
            </li>

              <li><a><i class="fa fa-align-justify"></i> Category child <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                      <li><a href="{{route('list.category_child')}}">List</a></li>
                      <li><a href="{{route('add.category_child')}}">Add</a></li>
                  </ul>
              </li>

              <li><a><i class="fa fa-cubes"></i> Product <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                      <li><a href="{{route('list.product')}}">List</a></li>
                      <li><a href="{{route('add.product')}}">Add</a></li>
                  </ul>
              </li>

              <li><a href=""><i class="fa fa-shopping-cart"></i> Ivoices</a>
              </li>

              <li><a><i class="fa fa-sliders"></i> Slide <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                      <li><a href="{{route('list.slide')}}">List</a></li>
                      <li><a href="{{route('add.slide')}}">Add</a></li>
                  </ul>
              </li>

              <li><a><i class="fa fa-cubes"></i> User <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                      <li><a href="{{route('list.user')}}">List</a></li>
                  </ul>
              </li>

          </ul>
        </div>

      </div>
