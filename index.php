<!DOCTYPE html>
<html>
  <head>
    <title> Maryam Auf </title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <header>
      <h1>Maryam Auf</h1>
    </header>
    <nav>
      <ul>
        <li><a href="#about">About</a></li>
        <li><a href="#skills">Skills</a></li>
        <li><a href="#projects">Projects</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
    </nav>
    <section id="about">
      <h2>About Me</h2>
      <p> I am a student at Business Information systems Helwan university level 3
        <br>
        I am interested in coding and all relevant fields
        <br>
        firstly i learned the basics  which is:
data structures,
algorithms,
OOP,
clean code,
SOLID principales,
design patterns and
problem solving
<br>
then i learned full stack development,
 but i will complete as a backend developer
    </section>
    

    <section id="projects">
      <h2>My Projects</h2>

      <div class="container">
		<?php 
		include './admin/connection.php';
           
	// Retrieve products from database
			$query = "SELECT * FROM projects";

			$result = mysqli_query($connection, $query);

			if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_array($result))
				 {
				?>
					<div class='product'>
					<h2> <?php echo $row['name'];?> </h2>
		   <center> <img src=" admin/<?php echo $row['image'];  ?>" </center>
					<p> description: <?php echo $row['description']; ?></p>
					
        </div>	
			<?php	
			}
		} 
            else {
				echo "<p>No products found.</p>";
			}
			?>

	</div>
  
  <section id="skills">
      <h2>My Skills</h2>
      <p>
  <b> Interpersonal: </b><br>
  communication, teamwork, presentation, self-study
  <br>
 <b> Technical: </b><br>
 data structures, algorithms,
  OOP, problem-solving, C++, PHP, MVC, Laravel, 
  C# ASP .NET, databases, SQL, Rest API, SDLC, Agile,
   Git, Github, shell scripting, UI, 
   front-end development

</p>
      </section>
    </section>

    <section id="contact">

      <h2>Contact Me</h2> 
      <p>Email: maryam.mohamed812002@gmail.com</p>
      <p>Phone: +20 01093003328 </p>
      <p> <a target="_blank" href='https://www.linkedin.com/in/maryam-mohamed-auf/'>linkedin</a></p>
      <p> <a target="_blank" href='https://github.com/MariamMohamedOof'>github</a></p>
      <p><a target="_blank"
      href='https://docs.google.com/document/d/1laU_SD1eGloXkpGXqxhZ7UOY1Z1HVnCTU0nHpxEhR18/edit?usp=sharing'
      >My CV</a>
     </p>

    </section>
    <footer>
      <p>&copy; 2023 My Portfolio</p>
    </footer>
  </body>
</html>