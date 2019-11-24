<?php

    if (isset($_POST['getData'])) {
        $conn = new mysqli('', '', '');

        $result = mysqli_select_db($conn,"");

        $start = $conn->real_escape_string($_POST['start']);
        $limit = $conn->real_escape_string($_POST['limit']);

        $sql = $conn->query("SELECT name, content FROM pic_board LIMIT $start, $limit");
        if ($sql->num_rows > 0) {
            $response = "";

            while ($data = $sql->fetch_array()) {
                $response .= '
					<div>
						<h2>' . $data['name'] . '</h2>
						<p>' . $data['content'] . '</p>
					</div>
				';
            }

            exit($response);
        } else
            exit('reachedMax');
    }

?>
