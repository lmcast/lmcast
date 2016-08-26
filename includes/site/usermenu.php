<table id="userMenu">
    <tr id="userMenu-desktop">
        <?php if(isset($_SESSION['ID'])){ ?>
        <td class="userMenuLeft">
           <ul>
             <li>
               <a href="/admin/" title="dashboard"><i class="fa fa-tachometer"></i> Dashboard</a>
             </li>
             <li class="dropdown">
               <a href="#" title="Add"><i class="fa fa-plus"></i> Add</a>
               <ul>
                 <li>
                  <a href="/admin/addUser" title="Add User"><i class="fa fa-user-plus"></i> Add User</a>
                 </li>
                 <li>
                  <a href="/admin/addPosts" title="Add Post"><i class="fa fa-plus"></i> Add Post</a>
                 </li>
               </ul>
              </li>
           </ul>
        </td>
        <td class="userMenuRight">
          <ul>
            <li>
              <img src="<?php cUserAvatar2(25);?>" alt="<?php echo cUserName2();?>"> <?php echo 'Welcome, ' . cUserName2();?>
              <ul>
                <li><a href="/logout" title="Logout"><i class="fa fa-sign-out"></i> Logout</li>
              </ul>
            </li>
          </ul>
        </td>
        <?php
        } else {
        ?>
          <td class="userMenuLeft">
            Logged out
          </td>
          <td class="userMenuRight">
              <?php echo '<a href="/login/?redir=' . $_SERVER['REQUEST_URI'] . '" title="Login"><i class="fa fa-key"></i> Login</a>'?>
          </td>
        <?php } ?>
    </tr>
</table>
