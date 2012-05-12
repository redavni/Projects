<?php
// connect to the database
include_once('mysqli_connect.php');

// begin constructing the query
$query = "SELECT id, name, parent_id FROM categories ";

// check for pid (parent_id)
if (isset($_GET['pid']))
{
  $pid = trim($_GET['pid']);
}
else
{
  // a parent id of 0 will pull root categories
  $pid = 0;
}

if (isset($_GET['id']))
{
  $id = trim($_GET['id']);
}
else
{
  $id = 'id';
}

$query .= " WHERE parent_id = {$pid}";
$query .= " AND id = {$id}";
$query .= " ORDER BY Name";

// get categories
$result = mysqli_query($dbc, $query);

// get notes
$query = "SELECT n.title, n.id FROM notes_categories nc LEFT JOIN categories c ON nc.category_id = c.id LEFT JOIN notes n ON nc.note_id = n.id";
$query .= " WHERE c.id = {$pid}";
$notesResult = mysqli_query($dbc, $query);
?>

<!doctype html>  
<html lang="en">  
<head>  
	<meta charset="utf-8">  
	<title>Programming Notes</title>  
	<meta name="description" content="The HTML5 Herald">  
	<meta name="Jake Klassen" content="Notes">

	<!-- Include required JS files -->
	<script type="text/javascript" src="scripts/shCore.js"></script>
	<!--
	At least one brush, here we choose JS. You need to include a brush for every
	language you want to highlight
	-->
	<script type="text/javascript" src="scripts/shBrushJScript.js"></script>
	<script type="text/javascript" src="scripts/shBrushCpp.js"></script>
 
	<!-- Include *at least* the core style and default theme -->
	<link href="styles/shCore.css" rel="stylesheet" type="text/css" />
	<link href="styles/shCoreFadeToGrey.css" rel="stylesheet" type="text/css" />
	<link href="styles/shThemeFadeToGrey.css" rel="stylesheet" type="text/css" />
	<link href="styles/styles.css" rel="stylesheet" type="text/css" />
	<!--[if lt IE 9]>  
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>  
	<![endif]-->  
</head>

<body>
	<div class="page_header">PROGRAMMING NOTES</div>
		<div class="horizontal_nav">
			<ul>
				<li>Home</li>
				<li>Create Category</li>
				<li>Create Note</li>
			</ul>
		</div>
	<div class="bg_panel">
		<div class="nav_pane">
			<div class="navigation">
				<h2>Navigation</h2>
				<?php
				// check if we have data
				if (mysqli_num_rows($result))
				{ 
					echo '<ul>';
					// check if we are in a nested category
					if ($row = mysqli_fetch_row($result))
					{
						if ($row[2] != 0)
						{
							// If this is not a root category, we need the parent_id of the parent_id of any records we return
							$getPrevParentResult = mysqli_query($dbc, "SELECT id, parent_id FROM categories WHERE id = {$row[2]}");
							if (mysqli_num_rows($getPrevParentResult))
							{
								$prevParent = mysqli_fetch_row($getPrevParentResult);
								echo '<li><a href="http://bitknight.com/notes/?pid=' . $prevParent[1] . '">..</a></li>';
							}
							else
							{
								// parent not found somehow...
								// report error
							}
						}
				  
						// process more rows
						do
						{
							echo '<li><a href="http://bitknight.com/notes/?pid=' . $row[0] . '">' . $row[1] . '</a></li>';
						} while($row = mysqli_fetch_row($result));
					}		
							
						// Get any notes related to this category
						if (isset($pid) && $pid != 0)
						{
							echo '<li><hr /></li>';
							echo '<li><b>Notes</b></li>';
						}
						if (mysqli_num_rows($notesResult))
						{
							while ($row = mysqli_fetch_row($notesResult))
							{
								echo '<li><a href="index.php?pid=' . $pid . '&nid=' . $row[1] . '">' . $row[0] . '</a></li>';
							}
						}
						else
						{
							if ($pid != 0)
							{
								echo '<p>No Notes</p>';
							}
						}
							
					echo '</ul>';			
				}
				else 
				{
					// check if we are in a nested category but we have nothing to display
					if (isset($pid) && $pid != 0)
					{
						$getPrevParentResult = mysqli_query($dbc, "SELECT id, parent_id FROM categories WHERE id = {$pid}");
						if (mysqli_num_rows($getPrevParentResult))
						{
							$prevParent = mysqli_fetch_row($getPrevParentResult);
							echo '<ul><li><a href="http://bitknight.com/notes/?pid=' . $prevParent[1] . '">..</a></li>';
						}
						// Get any notes related to this category
						echo '<li><hr /></li>';
						echo '<li><b>Notes</b></li>';
						if (mysqli_num_rows($notesResult))
						{
							while ($row = mysqli_fetch_row($notesResult))
							{
								echo '<li><a href="index.php?pid=' . $pid . '&nid=' . $row[1] . '">' . $row[0] . '</a></li>';
							}
						}
						else
						{
							echo '<p>No Notes</p>';
						}
						echo '</ul>';
					}
				}
			  ?>
		</div>
		</div>
		<div class="note_pane">
			<div class="notes">
			<h2>Latest Notes</h2>
					
				<?php
				// Check if a note id (nid) is appened to the URL and show it, otherwise show the latest 5 notes.
				if (isset($nid))
				{
					$query = "SELECT * FROM notes WHERE id = {$nid}";
				}
				else
				{
					$query = "SELECT * FROM notes ORDER BY date_created DESC LIMIT 5";
				}
				
				$result = mysqli_query($dbc, $query);
				
				if ($result && mysqli_num_rows($result))
				{
					while ($row = mysqli_fetch_row($result))
					{
						echo 'File: <b>' . $row[1] . "</b><br />\n" . $row[2];
					}
				}
				else
				{
					echo '<p>No notes in the database</p>';
				}
				?>
					
					
			<script type="text/javascript">
				SyntaxHighlighter.all()
			</script>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</body>  
</html>