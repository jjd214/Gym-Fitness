<?php
class view extends Config
{

    private $gPlans;
    private $gTrainers;

    public function viewData()
    {
        $con = $this->con();
        $sql = "SELECT * FROM `tbl_todolist` WHERE `status` = 'PENDING'";
        $data = $con->prepare($sql);
        $data->execute();

        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        echo "<h3>Pending Task</h3>";
        echo "<table class='table table-dark table-striped table-sm'>";
        echo "<thead>
            <tr>
              <th> Task Items </th>
              <th> Action </th>
            </tr>
         </thead><tbody>";
        
        foreach ($result as $results) {
            echo "<tr>";
            echo "<td>$results[item]</td>";
            echo "<td>
                  <a class='btn btn-primary btn-sm' href='index.php?edit=$results[id]'>Mark as Completed</a>
                  <a class='btn btn-danger btn-sm' href='index.php?delete=$results[id]'>Delete</a>
                </td>";
            echo "</tr>";
        }
        echo "</tbody></table>";
    }

    public function viewCompletedData()
    {
        $con = $this->con();
        $sql = "SELECT * FROM `tbl_todolist` WHERE `status` = 'COMPLETED'";
        $data = $con->prepare($sql);
        $data->execute();

        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        echo "<h3 class='mb-4 mt-5'>Completed Task</h3>";
        echo "<table class='table table-dark table-striped table-sm'>";
        echo "<thead>
            <tr>
              <th> Task Items </th>
              <th> Date Completed</th>
            </tr>
         </thead><tbody>";
        
        foreach ($result as $results) {
            echo "<tr>";
            echo "<td>$results[item]</td>";
            echo "<td>$results[date_completed]</td>";
            echo "</tr>";
        }
        echo "</tbody></table>";
    }

    public function getTrainers()
    {
        $con = $this->con();
        $sql = "SELECT * FROM `tbl_trainers`";
        $data = $con->prepare($sql);
        $data->execute();
        $result = $data->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function getPlans()
    {
        $con = $this->con();
        $sql = "SELECT * FROM `tbl_plans`";
        $data = $con->prepare($sql);
        $data->execute();
        $result = $data->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function globalPlans()
    {
        $con = $this->con();
        $sql = "SELECT * FROM `tbl_plans`";
        $data = $con->prepare($sql);
        $data->execute();
        $this->gPlans = $data->fetchAll(PDO::FETCH_ASSOC);

        return $this->gPlans;
    }

    public function globalTrainers()
    {
        $con = $this->con();
        $sql = "SELECT * FROM `tbl_trainers`";
        $data = $con->prepare($sql);
        $data->execute();
        $this->gTrainers = $data->fetchAll(PDO::FETCH_ASSOC);

        return $this->gTrainers;
    }

    public function viewMembers()
    {
        $con = $this->con();
        $sql = "SELECT * FROM `tbl_members`";
        $stmt = $con->prepare($sql);
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $itemsPerPage = 2; // Set the number of items to display per page
        $totalItems = count($data);
        $totalPages = ceil($totalItems / $itemsPerPage);

        if (isset($_GET['page']) && is_numeric($_GET['page'])) {
            $currentPage = max(1, min($_GET['page'], $totalPages));
        } else {
            $currentPage = 1;
        }

        $offset = ($currentPage - 1) * $itemsPerPage;
        $data = array_slice($data, $offset, $itemsPerPage);

        echo "<div class='container text-center'>";
        echo "<table class='table table-bordered table-hover data-table caption-top'>";
        echo "<caption>List of Members</caption>";
        echo "<thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact No.</th>
                    <th>Gender</th>
                    <th>Plan</th>
                    <th>Trainer</th>
                </tr>
              </thead><tbody>";

        $count = 1;

        foreach ($data as $member) {
            echo "<tr>";
            echo "<td>$count</td>";
            echo "<td>{$member['lastname']} ", " {$member['firstname']}</td>";
            echo "<td>{$member['email']}</td>";
            echo "<td>{$member['contactno']}</td>";
            echo "<td>{$member['gender']}</td>";
            echo "<td>{$member['plan']}</td>";
            echo "<td>{$member['trainer']}</td>";
            echo "</tr>";

            $count++;
        }

        echo "</tbody></table>";

        // Add the pagination
        echo "<nav aria-label='Page navigation example'>";
        echo "<ul class='pagination justify-content-end'>";

        // Previous page link
        if ($currentPage > 1) {
            echo "<li class='page-item'><a class='page-link' href='?page=" . ($currentPage - 1) . "'>Previous</a></li>";
        } else {
            echo "<li class='page-item disabled'><a class='page-link'>Previous</a></li>";
        }

        // Numbered page links
        for ($i = 1; $i <= $totalPages; $i++) {
            if ($i == $currentPage) {
                echo "<li class='page-item active'><a class='page-link' href='#'>$i</a></li>";
            } else {
                echo "<li class='page-item'><a class='page-link' href='?page=$i'>$i</a></li>";
            }
        }

        // Next page link
        if ($currentPage < $totalPages) {
            echo "<li class='page-item'><a class='page-link' href='?page=" . ($currentPage + 1) . "'>Next</a></li>";
        } else {
            echo "<li class='page-item disabled'><a class='page-link'>Next</a></li>";
        }

        echo "</ul>";
        echo "</nav>";
        echo "</div>";
    }

    public function manageMembers()
    {
        $con = $this->con();
        $sql = "SELECT * FROM `tbl_members`";
        $stmt = $con->prepare($sql);
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $itemsPerPage = 2; // Set the number of items to display per page
        $totalItems = count($data);
        $totalPages = ceil($totalItems / $itemsPerPage);

        if (isset($_GET['page']) && is_numeric($_GET['page'])) {
            $currentPage = max(1, min($_GET['page'], $totalPages));
        } else {
            $currentPage = 1;
        }

        $offset = ($currentPage - 1) * $itemsPerPage;
        $data = array_slice($data, $offset, $itemsPerPage);

        echo "<div class='container text-center'>";
        echo "<table class='table table-bordered table-hover data-table caption-top'>";
        echo "<caption>List of Members</caption>";
        echo "<thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact No.</th>
                    <th>Gender</th>
                    <th>Plan</th>
                    <th>Trainer</th>
                    <th>Action</th>
                </tr>
              </thead><tbody>";

        $count = 1;

        $this->globalPlans();
        $this->globalTrainers();

        foreach ($data as $member) {
            echo "<tr>";
            echo "<td>$count</td>";
            echo "<td>{$member['lastname']} ", " {$member['firstname']}</td>";
            echo "<td>{$member['email']}</td>";
            echo "<td>{$member['contactno']}</td>";
            echo "<td>{$member['gender']}</td>";
            echo "<td>{$member['plan']}</td>";
            echo "<td>{$member['trainer']}</td>";
            echo "<td>
                  <a class='btn btn-primary btn-sm' href='#editModal$count' data-bs-toggle='modal' data-bs-target='#editModal$count'><i class='fas fa-edit'></i> Edit</a>
                  <a class='btn btn-danger btn-sm' href='manage_members.php?delete={$member['id']}'><i class='fas fa-trash-alt'></i> Delete</a>
                </td>";
            echo "</tr>";

            // Modal structure for each member
            echo "<div class='modal fade' id='editModal$count' tabindex='-1' aria-labelledby='editModalLabel$count' aria-hidden='true'>
                <div class='modal-dialog'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <h5 class='modal-title' id='editModalLabel$count'>Edit Member</h5>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                        </div>
                        <div class='modal-body'>
                            <!-- Form for editing member -->
                            <form action='manage_members.php?edit={$member['id']}' method='post' enctype='multipart/form-data'>
                                <label for='fname$count'>First Name</label>
                                <input type='text' id='fname$count' name='fname' class='form-control' placeholder='Enter First Name...' value='{$member['firstname']}' required>

                                <label for='lname$count'>Last Name</label>
                                <input type='text' id='lname$count' name='lname' class='form-control' placeholder='Enter Last Name...' value='{$member['lastname']}' required>

                                <label for='mname$count'>Middle Name</label>
                                <input type='text' id='mname$count' name='mname' class='form-control' placeholder='Enter Middle Name...' value='{$member['middlename']}' required>

                                <label for='email$count'>Email</label>
                                <input type='email' id='email$count' name='email' class='form-control' placeholder='Enter Email...' value='{$member['email']}'required>

                                <label for='contactno$count'>Contact Number</label>
                                <input type='number' id='contactno$count' name='contactno' class='form-control' placeholder='Enter Contact Number...' value='{$member['contactno']}' required>

                                <label for='gender$count'>Gender</label>
                                <select id='gender$count' name='gender' class='form-select'>
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>

                                <label for='address$count'>Address</label>
                                <textarea id='address$count' name='address' class='form-control' cols='30' rows='5' placeholder='Enter Address'>{$member['address']}</textarea>

                                <label for='plan$count'>Plan</label>
                                <select id='plan$count' name='plan' class='form-select'>";
            foreach ($this->gPlans as $plan) {
                echo '<option>' . $plan['plan'] . '</option>';
            }
            echo "</select>";

            echo "<label for='trainer$count'>Trainer</label>
                                                          <select id='trainer$count' name='trainer' class='form-select'>";
            foreach ($this->gTrainers as $trainer) {
                echo '<option>' . $trainer['firstname'] . ' ' . $trainer['lastname'] . '</option>';
            }
            echo "</select>";

            echo "<div class='modal-footer'>
                                                              <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                                              <input type='submit' name='submit' class='btn btn-primary' value='Save Changes'>
                                                          </div>
                                                      </form>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>";

            $count++;
        }

        echo "</tbody></table>";

        // Add the pagination
        echo "<nav aria-label='Page navigation example'>";
        echo "<ul class='pagination justify-content-end'>";

        // Previous page link
        if ($currentPage > 1) {
            echo "<li class='page-item'><a class='page-link' href='?page=" . ($currentPage - 1) . "'>Previous</a></li>";
        } else {
            echo "<li class='page-item disabled'><a class='page-link'>Previous</a></li>";
        }

        // Numbered page links
        for ($i = 1; $i <= $totalPages; $i++) {
            if ($i == $currentPage) {
                echo "<li class='page-item active'><a class='page-link' href='#'>$i</a></li>";
            } else {
                echo "<li class='page-item'><a class='page-link' href='?page=$i'>$i</a></li>";
            }
        }

        // Next page link
        if ($currentPage < $totalPages) {
            echo "<li class='page-item'><a class='page-link' href='?page=" . ($currentPage + 1) . "'>Next</a></li>";
        } else {
            echo "<li class='page-item disabled'><a class='page-link'>Next</a></li>";
        }

        echo "</ul>";
        echo "</nav>";
        echo "</div>";
    }

    public function viewEquipments()
    {

        $con = $this->con();
        $sql = "SELECT * FROM `tbl_equipments`";
        $stmt = $con->prepare($sql);
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $itemsPerPage = 10; // Set the number of items to display per page
        $totalItems = count($data);
        $totalPages = ceil($totalItems / $itemsPerPage);

        if (isset($_GET['page']) && is_numeric($_GET['page'])) {
            $currentPage = max(1, min($_GET['page'], $totalPages));
        } else {
            $currentPage = 1;
        }

        $offset = ($currentPage - 1) * $itemsPerPage;
        $data = array_slice($data, $offset, $itemsPerPage);

        echo "<div class='container text-center'>";
        echo "<table class='table table-bordered table-hover data-table caption-top'>";
        echo "<caption>List of Equipments</caption>";
        echo "<thead>
                <tr>
                    <th>#</th>
                    <th>Equipment</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Amount</th>
                    <th>Vendor</th>
                    <th>Address</th>
                    <th>Contact</th>
                    <th>Purchased Date</th>
                </tr>
              </thead><tbody>";

        $count = 1;
        $totalAmount = 0;

        foreach ($data as $equipment) {
            echo "<tr>";
            echo "<td>$count</td>";
            echo "<td>{$equipment['equipment']}</td>";
            echo "<td>{$equipment['description']}</td>";
            echo "<td>{$equipment['quantity']}</td>";
            $totalAmount += $equipment['quantity'] * $equipment['cost'];
            echo "<td>₱ $totalAmount</td>";
            echo "<td>{$equipment['vendor']}</td>";
            echo "<td>{$equipment['address']}</td>";
            echo "<td>{$equipment['contactno']}</td>";
            echo "<td>{$equipment['dop']}</td>";
            echo "</tr>";


            $count++;
        }

        echo "</tbody></table>";

        // Add the pagination
        echo "<nav aria-label='Page navigation example'>";
        echo "<ul class='pagination justify-content-end'>";

        // Previous page link
        if ($currentPage > 1) {
            echo "<li class='page-item'><a class='page-link' href='?page=" . ($currentPage - 1) . "'>Previous</a></li>";
        } else {
            echo "<li class='page-item disabled'><a class='page-link'>Previous</a></li>";
        }

        // Numbered page links
        for ($i = 1; $i <= $totalPages; $i++) {
            if ($i == $currentPage) {
                echo "<li class='page-item active'><a class='page-link' href='#'>$i</a></li>";
            } else {
                echo "<li class='page-item'><a class='page-link' href='?page=$i'>$i</a></li>";
            }
        }

        // Next page link
        if ($currentPage < $totalPages) {
            echo "<li class='page-item'><a class='page-link' href='?page=" . ($currentPage + 1) . "'>Next</a></li>";
        } else {
            echo "<li class='page-item disabled'><a class='page-link'>Next</a></li>";
        }

        echo "</ul>";
        echo "</nav>";
        echo "</div>";
    }

    public function manageEquipments()
    {
        $con = $this->con();
        $sql = "SELECT * FROM `tbl_equipments`";
        $stmt = $con->prepare($sql);
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $itemsPerPage = 2; // Set the number of items to display per page
        $totalItems = count($data);
        $totalPages = ceil($totalItems / $itemsPerPage);

        if (isset($_GET['page']) && is_numeric($_GET['page'])) {
            $currentPage = max(1, min($_GET['page'], $totalPages));
        } else {
            $currentPage = 1;
        }

        $offset = ($currentPage - 1) * $itemsPerPage;
        $data = array_slice($data, $offset, $itemsPerPage);

        echo "<div class='container text-center'>";
        echo "<table class='table table-bordered table-hover data-table caption-top'>";
        echo "<caption>List of Members</caption>";
        echo "<thead>
                <tr>
                    <th>#</th>
                    <th>Equipment</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Amount</th>
                    <th>Purchased Date</th>
                    <th>Action</th>
                </tr>
              </thead><tbody>";

        $count = 1;
        $totalAmount = 0;


        foreach ($data as $equipment) {
            echo "<tr>";
            echo "<td>$count</td>";
            echo "<td>{$equipment['equipment']}</td>";
            echo "<td>{$equipment['description']}</td>";
            echo "<td>{$equipment['quantity']}</td>";
            $totalAmount += $equipment['quantity'] * $equipment['cost'];
            echo "<td>₱ $totalAmount</td>";
            echo "<td>{$equipment['dop']}</td>";
            echo "<td>
                  <a class='btn btn-primary btn-sm' href='#editModal$count' data-bs-toggle='modal' data-bs-target='#editModal$count'><i class='fas fa-edit'></i> Edit</a>
                  <a class='btn btn-danger btn-sm' href='manage_equipments.php?delete={$equipment['id']}'><i class='fas fa-trash-alt'></i> Delete</a>
                </td>";
            echo "</tr>";

            echo "<div class='modal fade' id='editModal$count' tabindex='-1' aria-labelledby='editModal$count' aria-hidden='true'>";
            echo "<div class='modal-dialog'>";
            echo "<div class='modal-content'>";
            echo "<div class='modal-header'>";
            echo "<h5 class='modal-title' id='editModal$count'>Edit Equipment</h5>";
            echo "<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>";
            echo "</div>";
            echo "<div class='modal-body'>";
            echo "<form action='manage_equipments.php?edit={$equipment['id']}' method='post'>";
            echo "<div class='mb-3'>";
            echo "<label for='equipment' class='form-label'>Equipment Name</label>";
            echo "<input type='text' class='form-control' name='equipment' placeholder='Equipment name...' value='{$equipment['equipment']}' required>";
            echo "</div>";
            echo "<div class='mb-3'>";
            echo "<label for='description' class='form-label'>Short Description</label>";
            echo "<input type='text' class='form-control' name='description' placeholder='Short Description...' value='{$equipment['description']}' required>";
            echo "</div>";
            echo "<div class='mb-3'>";
            echo "<label for='dop' class='form-label'>Date of Purchase</label>";
            echo "<input type='date' class='form-control' name='dop' value='{$equipment['dop']}'>";
            echo "</div>";
            echo "<div class='mb-3'>";
            echo "<label for='qty' class='form-label'>Equipment Quantity</label>";
            echo "<input type='number' class='form-control' name='qty' placeholder='Equipment Qty' value='{$equipment['quantity']}'>";
            echo "</div>";

            // Other Details
            echo "<p>Other Details</p>";

            echo "<div class='mb-3'>";
            echo "<label for='vendor' class='form-label'>Vendor</label>";
            echo "<input type='text' class='form-control' name='vendor' placeholder='Vendor' value='{$equipment['vendor']}' required>";
            echo "</div>";
            echo "<div class='mb-3'>";
            echo "<label for='address' class='form-label'>Vendor Address</label>";
            echo "<input type='text' class='form-control' name='address' placeholder='Vendor Address' value='{$equipment['address']}' required>";
            echo "</div>";
            echo "<div class='mb-3'>";
            echo "<label for='contactno' class='form-label'>Vendor Contact Number</label>";
            echo "<input type='number' class='form-control' name='contactno' placeholder='Vendor Contact Number' value='{$equipment['contactno']}'>";
            echo "</div>";
            echo "<div class='mb-3'>";
            echo "<label for='cost' class='form-label'>Cost per item</label>";
            echo "<input type='number' class='form-control' name='cost' value='{$equipment['cost']}'>";
            echo "</div>";

            echo "<input type='submit' class='btn btn-primary' name='submit' value='Submit Details'>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";


            $count++;
        }

        echo "</tbody></table>";

        // Add the pagination
        echo "<nav aria-label='Page navigation example'>";
        echo "<ul class='pagination justify-content-end'>";

        // Previous page link
        if ($currentPage > 1) {
            echo "<li class='page-item'><a class='page-link' href='?page=" . ($currentPage - 1) . "'>Previous</a></li>";
        } else {
            echo "<li class='page-item disabled'><a class='page-link'>Previous</a></li>";
        }

        // Numbered page links
        for ($i = 1; $i <= $totalPages; $i++) {
            if ($i == $currentPage) {
                echo "<li class='page-item active'><a class='page-link' href='#'>$i</a></li>";
            } else {
                echo "<li class='page-item'><a class='page-link' href='?page=$i'>$i</a></li>";
            }
        }

        // Next page link
        if ($currentPage < $totalPages) {
            echo "<li class='page-item'><a class='page-link' href='?page=" . ($currentPage + 1) . "'>Next</a></li>";
        } else {
            echo "<li class='page-item disabled'><a class='page-link'>Next</a></li>";
        }

        echo "</ul>";
        echo "</nav>";
        echo "</div>";
    }

    public function viewPlans()
    {
        $con = $this->con();
        $stmt = $con->prepare("SELECT * FROM `tbl_plans`");
        $stmt->execute();
        $data = $stmt->fetchAll();

        $itemsPerPage = 10; // Set the number of items to display per page
        $totalItems = count($data);
        $totalPages = ceil($totalItems / $itemsPerPage);

        if (isset($_GET['page']) && is_numeric($_GET['page'])) {
            $currentPage = max(1, min($_GET['page'], $totalPages));
        } else {
            $currentPage = 1;
        }

        $offset = ($currentPage - 1) * $itemsPerPage;
        $data = array_slice($data, $offset, $itemsPerPage);

        echo "<div class='container text-center'>";
        echo "<table class='table table-bordered table-hover data-table caption-top'>";
        echo "<caption>List of Plans</caption>";
        echo "<thead>
                <tr>
                    <th>#</th>
                    <th>Plan</th>
                    <th>Amount</th>
                </tr>
            </thead><tbody>";

        $count = 1;
        foreach ($data as $plan) {
            echo "<tr>";
            echo "<td>$count</td>";
            echo "<td>{$plan['plan']}</td>";
            echo "<td>₱ {$plan['amount']}</td>";
            echo "</tr>";
            $count++;
        }

        echo "</tbody></table>";

        // Add the pagination
        echo "<nav aria-label='Page navigation example'>";
        echo "<ul class='pagination justify-content-end'>";

        // Previous page link
        if ($currentPage > 1) {
            echo "<li class='page-item'><a class='page-link' href='?page=" . ($currentPage - 1) . "'>Previous</a></li>";
        } else {
            echo "<li class='page-item disabled'><a class='page-link'>Previous</a></li>";
        }

        // Numbered page links
        for ($i = 1; $i <= $totalPages; $i++) {
            if ($i == $currentPage) {
                echo "<li class='page-item active'><a class='page-link' href='#'>$i</a></li>";
            } else {
                echo "<li class='page-item'><a class='page-link' href='?page=$i'>$i</a></li>";
            }
        }

        // Next page link
        if ($currentPage < $totalPages) {
            echo "<li class='page-item'><a class='page-link' href='?page=" . ($currentPage + 1) . "'>Next</a></li>";
        } else {
            echo "<li class='page-item disabled'><a class='page-link'>Next</a></li>";
        }

        echo "</ul>";
        echo "</nav>";
        echo "</div>";
    }

    public function managePlans()
    {
        $con = $this->con();
        $stmt = $con->prepare("SELECT * FROM `tbl_plans`");
        $stmt->execute();
        $data = $stmt->fetchAll();

        $itemsPerPage = 10; // Set the number of items to display per page
        $totalItems = count($data);
        $totalPages = ceil($totalItems / $itemsPerPage);

        if (isset($_GET['page']) && is_numeric($_GET['page'])) {
            $currentPage = max(1, min($_GET['page'], $totalPages));
        } else {
            $currentPage = 1;
        }

        $offset = ($currentPage - 1) * $itemsPerPage;
        $data = array_slice($data, $offset, $itemsPerPage);

        echo "<div class='container text-center'>";
        echo "<table class='table table-bordered table-hover data-table caption-top'>";
        echo "<caption>List of Plans</caption>";
        echo "<thead>
                    <tr>
                        <th>#</th>
                        <th>Plan</th>
                        <th>Amount</th>
                        <th>Action</th>
                    </tr>
                </thead><tbody>";

        $count = 1;
        foreach ($data as $plan) {
            echo "<tr>";
            echo "<td>$count</td>";
            echo "<td>{$plan['plan']}</td>";
            echo "<td>₱ {$plan['amount']}</td>";
            echo "<td>
              <a class='btn btn-primary btn-sm' href='#editModal{$plan['id']}' data-bs-toggle='modal' data-bs-target='#editModal{$plan['id']}'><i class='fas fa-edit'></i> Edit</a>
              <a class='btn btn-danger btn-sm' href='manage_plans.php?delete={$plan['id']}'><i class='fas fa-trash-alt'></i> Delete</a>
                </td>";
            echo "</tr>";

            // Edit Modal
            echo "<div class='modal fade' id='editModal{$plan['id']}' tabindex='-1' aria-labelledby='editModal{$plan['id']}' aria-hidden='true'>";
            echo "<div class='modal-dialog'>";
            echo "<div class='modal-content'>";
            echo "<div class='modal-header'>";
            echo "<h5 class='modal-title' id='editModal{$plan['id']}'>Edit Plan</h5>";
            echo "<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>";
            echo "</div>";
            echo "<div class='modal-body'>";
            echo "<form action='manage_plans.php?edit={$plan['id']}' method='post'>";
            echo "<div class='mb-3'>";
            echo "<label for='plan' class='form-label'>Plan</label>";
            echo "<input type='text' class='form-control' name='plan' placeholder='Plan...' value='{$plan['plan']}' required>";
            echo "</div>";
            echo "<div class='mb-3'>";
            echo "<label for='amount' class='form-label'>Amount</label>";
            echo "<input type='text' class='form-control' name='amount' placeholder='Amount...' value='{$plan['amount']}' required>";
            echo "</div>";

            // Additional fields as needed for editing a plan

            echo "<input type='submit' class='btn btn-primary' name='submit' value='Submit Details'>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            $count++;
        }

        echo "</tbody></table>";

        // Add the pagination
        echo "<nav aria-label='Page navigation example'>";
        echo "<ul class='pagination justify-content-end'>";

        // Previous page link
        if ($currentPage > 1) {
            echo "<li class='page-item'><a class='page-link' href='?page=" . ($currentPage - 1) . "'>Previous</a></li>";
        } else {
            echo "<li class='page-item disabled'><a class='page-link'>Previous</a></li>";
        }

        // Numbered page links
        for ($i = 1; $i <= $totalPages; $i++) {
            if ($i == $currentPage) {
                echo "<li class='page-item active'><a class='page-link' href='#'>$i</a></li>";
            } else {
                echo "<li class='page-item'><a class='page-link' href='?page=$i'>$i</a></li>";
            }
        }

        // Next page link
        if ($currentPage < $totalPages) {
            echo "<li class='page-item'><a class='page-link' href='?page=" . ($currentPage + 1) . "'>Next</a></li>";
        } else {
            echo "<li class='page-item disabled'><a class='page-link'>Next</a></li>";
        }

        echo "</ul>";
        echo "</nav>";
        echo "</div>";
    }

    public function viewTrainers()
    {
        $con = $this->con();
        $sql = "SELECT * FROM `tbl_trainers`";
        $stmt = $con->prepare($sql);
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $itemsPerPage = 10; // Set the number of items to display per page
        $totalItems = count($data);
        $totalPages = ceil($totalItems / $itemsPerPage);

        if (isset($_GET['page']) && is_numeric($_GET['page'])) {
            $currentPage = max(1, min($_GET['page'], $totalPages));
        } else {
            $currentPage = 1;
        }

        $offset = ($currentPage - 1) * $itemsPerPage;
        $data = array_slice($data, $offset, $itemsPerPage);

        echo "<div class='container text-center'>";
        echo "<table class='table table-bordered table-hover data-table caption-top'>";
        echo "<caption>List of Trainers</caption>";
        echo "<thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>email</th>
                    <th>Contact Number</th>
                    <th>Gender</th>
                    <th>Experience</th>
                    <th>Address</th>
                </tr>
            </thead><tbody>";

        $count = 1;
        foreach ($data as $trainer) {
            echo "<tr>";
            echo "<td>$count</td>";
            echo "<td>{$trainer['firstname']}, {$trainer['lastname']}</td>";
            echo "<td>{$trainer['email']}</td>";
            echo "<td>{$trainer['contactno']}</td>";
            echo "<td>{$trainer['gender']}</td>";
            echo "<td>{$trainer['experience']}</td>";
            echo "<td>{$trainer['address']}</td>";
            echo "</tr>";
            $count++;
        }

        echo "</tbody></table>";

        // Add the pagination
        echo "<nav aria-label='Page navigation example'>";
        echo "<ul class='pagination justify-content-end'>";

        // Previous page link
        if ($currentPage > 1) {
            echo "<li class='page-item'><a class='page-link' href='?page=" . ($currentPage - 1) . "'>Previous</a></li>";
        } else {
            echo "<li class='page-item disabled'><a class='page-link'>Previous</a></li>";
        }

        // Numbered page links
        for ($i = 1; $i <= $totalPages; $i++) {
            if ($i == $currentPage) {
                echo "<li class='page-item active'><a class='page-link' href='#'>$i</a></li>";
            } else {
                echo "<li class='page-item'><a class='page-link' href='?page=$i'>$i</a></li>";
            }
        }

        // Next page link
        if ($currentPage < $totalPages) {
            echo "<li class='page-item'><a class='page-link' href='?page=" . ($currentPage + 1) . "'>Next</a></li>";
        } else {
            echo "<li class='page-item disabled'><a class='page-link'>Next</a></li>";
        }

        echo "</ul>";
        echo "</nav>";
        echo "</div>";
    }

    public function manageTrainers()
    {
        $con = $this->con();
        $stmt = $con->prepare("SELECT * FROM `tbl_trainers`");
        $stmt->execute();
        $data = $stmt->fetchAll();

        $itemsPerPage = 10; // Set the number of items to display per page
        $totalItems = count($data);
        $totalPages = ceil($totalItems / $itemsPerPage);

        if (isset($_GET['page']) && is_numeric($_GET['page'])) {
            $currentPage = max(1, min($_GET['page'], $totalPages));
        } else {
            $currentPage = 1;
        }

        $offset = ($currentPage - 1) * $itemsPerPage;
        $data = array_slice($data, $offset, $itemsPerPage);

        echo "<div class='container text-center'>";
        echo "<table class='table table-bordered table-hover data-table caption-top'>";
        echo "<caption>List of Plans</caption>";
        echo "<thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact Number</th>
                        <th>Gender</th>
                        <th>Experience</th>
                        <th>Action</th>
                    </tr>
                </thead><tbody>";

        $count = 1;
        foreach ($data as $trainer) {
            echo "<tr>";
            echo "<td>$count</td>";
            echo "<td>{$trainer['firstname']} {$trainer['lastname']}</td>";
            echo "<td>{$trainer['email']}</td>";
            echo "<td>{$trainer['contactno']}</td>";
            echo "<td>{$trainer['gender']}</td>";
            echo "<td>{$trainer['experience']}</td>";
            echo "<td>
                <a class='btn btn-primary btn-sm' href='#editModal{$trainer['id']}' data-bs-toggle='modal' data-bs-target='#editModal{$trainer['id']}'><i class='fas fa-edit'></i> Edit</a>
                <a class='btn btn-danger btn-sm' href='manage_trainers.php?delete={$trainer['id']}'><i class='fas fa-trash-alt'></i> Delete</a>
            </td>";
            echo "</tr>";

            foreach ($data as $trainer) {
                echo "<div class='modal fade' id='editModal{$trainer['id']}' tabindex='-1' aria-labelledby='editModal{$trainer['id']}' aria-hidden='true'>";
                echo "<div class='modal-dialog'>";
                echo "<div class='modal-content'>";
                echo "<div class='modal-header'>";
                echo "<h5 class='modal-title' id='editModal{$trainer['id']}'>Edit Trainer</h5>";
                echo "<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>";
                echo "</div>";
                echo "<div class='modal-body'>";
                echo "<form action='manage_trainers.php?edit={$trainer['id']}' method='post'>";
                echo "<div class='mb-3'>";
                echo "<label for='fname' class='form-label'>First Name</label>";
                echo "<input type='text' class='form-control' name='fname' placeholder='First Name...' value='{$trainer['firstname']}' required>";
                echo "</div>";
                echo "<div class='mb-3'>";
                echo "<label for='lname' class='form-label'>Last Name</label>";
                echo "<input type='text' class='form-control' name='lname' placeholder='Last Name...' value='{$trainer['lastname']}' required>";
                echo "</div>";
                echo "<div class='mb-3'>";
                echo "<label for='email' class='form-label'>Email</label>";
                echo "<input type='email' class='form-control' name='email' placeholder='Email...' value='{$trainer['email']}' required>";
                echo "</div>";
                echo "<div class='mb-3'>";
                echo "<label for='contactno' class='form-label'>Contact Number</label>";
                echo "<input type='text' class='form-control' name='contactno' placeholder='Contact Number...' value='{$trainer['contactno']}' required>";
                echo "</div>";
                echo "<div class='mb-3'>";
                echo "<label for='gender' class='form-label'>Gender</label>";
                echo "<input type='text' class='form-control' name='gender' placeholder='Gender...' value='{$trainer['gender']}' required>";
                echo "</div>";
                echo "<div class='mb-3'>";
                echo "<label for='experience' class='form-label'>Experience</label>";
                echo "<input type='text' class='form-control' name='experience' placeholder='Experience...' value='{$trainer['experience']}' required>";
                echo "</div>";
                echo "<input type='submit' class='btn btn-primary' name='submit' value='Submit Details'>";
                echo "</form>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
            $count++;
        }

        echo "</tbody></table>";

        // Add the pagination
        echo "<nav aria-label='Page navigation example'>";
        echo "<ul class='pagination justify-content-end'>";

        // Previous page link
        if ($currentPage > 1) {
            echo "<li class='page-item'><a class='page-link' href='?page=" . ($currentPage - 1) . "'>Previous</a></li>";
        } else {
            echo "<li class='page-item disabled'><a class='page-link'>Previous</a></li>";
        }

        // Numbered page links
        for ($i = 1; $i <= $totalPages; $i++) {
            if ($i == $currentPage) {
                echo "<li class='page-item active'><a class='page-link' href='#'>$i</a></li>";
            } else {
                echo "<li class='page-item'><a class='page-link' href='?page=$i'>$i</a></li>";
            }
        }

        // Next page link
        if ($currentPage < $totalPages) {
            echo "<li class='page-item'><a class='page-link' href='?page=" . ($currentPage + 1) . "'>Next</a></li>";
        } else {
            echo "<li class='page-item disabled'><a class='page-link'>Next</a></li>";
        }

        echo "</ul>";
        echo "</nav>";
        echo "</div>";
    }
}
