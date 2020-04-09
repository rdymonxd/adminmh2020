<?php

    session_start();
    require '../conexion.php';

    if(!isset($_SESSION["login"])){
        header("Location: index.php");
    }

    $login = $_SESSION['login'];

    $t_funcionario_id = $_GET['id'];

    $user_id=null;
    

    $sql1= "SELECT t_funcionario.id,t_funcionario.img_photo,t_funcionario.name,t_funcionario.lastname,t_position.position,t_areafuncional.area_funcional,t_funcionario.phone,t_funcionario.email,t_funcionario.estado FROM (t_funcionario INNER JOIN t_position ON t_funcionario.id_position=t_position.id) INNER JOIN t_areafuncional ON t_funcionario.id_areafuncional=t_areafuncional.id WHERE t_funcionario.id = '$t_funcionario_id'";

    $query = $mysqli->query($sql1);
?>
<?php if($query->num_rows>0):?>
    <table class="table table-bordered table-hover">
<!--
    <thead>
        <th>Fotografia</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Cargo</th>
        <th>Area Funcional</th>
        <th>Estado</th>
    </thead>-->

<?php while ($r=$query->fetch_array()):?>
    
<tr>
    <!--<td><img src="../photos/<?php echo $r['img_photo'];?>.jpg" class="img-rounded" width="80px" height="60px" /></td>
    
	<td><?php echo $r["name"]; ?></td>
    <td><?php echo $r["lastname"]; ?></td>
    <td><?php echo $r["position"]; ?></td>
    <td><?php echo $r["area_funcional"]; ?></td>
    <td><?php echo $r["estado"]; ?></td>-->
    
    
</tr>
    
</table>


<div id="page-wrap">
    
        <img src="../photos/<?php echo $r['img_photo'];?>.jpg" alt="Photo of Cthulu" id="pic" />
    
        <div id="contact-info" class="vcard">
        
            <!-- Microformats! -->
        
            <h1 class="fn"><?php echo $r["name"];?></h1>
            <h1 class="fn"><?php echo $r["lastname"];?></h1>

        
            <p>
                Cell: <span class="tel">+591 <?php echo $r["phone"];?></span><br />
                Email: <a class="email" href="mailto:greatoldone@lovecraft.com"><?php echo $r['email']?></a>
            </p>
        </div>
                
        <div id="objective">
            <p>
                I am an outgoing and energetic (ask anybody) young professional, seeking a 
                career that fits my professional skills, personality, and murderous tendencies. 
                My squid-like head is a masterful problem solver and inspires fear in who gaze upon it. 
                I can bring world domination to your organization. 
            </p>
        </div>
        
        <div class="clear"></div>
        
        <dl>
            <dd class="clear"></dd>
            
            <dt>Education</dt>
            <dd>
                <h2>Withering Madness University - Planet Vhoorl</h2>
                <p><strong>Major:</strong> Public Relations<br />
                   <strong>Minor:</strong> Scale Tending</p>
            </dd>
            
            <dd class="clear"></dd>
            
            <dt>Skills</dt>
            <dd>
                <h2>Office skills</h2>
                <p>Office and records management, database administration, event organization, customer support, travel coordination</p>
                
                <h2>Computer skills</h2>
                <p>Microsoft productivity software (Word, Excel, etc), Adobe Creative Suite, Windows</p>
            </dd>
            
            <dd class="clear"></dd>
            
            <dt>Experience</dt>
            <dd>
                <h2>Doomsday Cult <span>Leader/Overlord - Baton Rogue, LA - 1926-2010</span></h2>
                <ul>
                    <li>Inspired and won highest peasant death competition among servants</li>
                    <li>Helped coordinate managers to grow cult following</li>
                    <li>Provided untimely deaths to all who opposed</li>
                </ul>
                
                <h2>The Watering Hole <span>Bartender/Server - Milwaukee, WI - 2009</span></h2>
                <ul>
                    <li>Worked on grass-roots promotional campaigns</li>
                    <li>Reduced theft and property damage percentages</li>
                    <li>Janitorial work, Laundry</li>
                </ul> 
            </dd>
            
            <dd class="clear"></dd>
            
            <dt>Hobbies</dt>
            <dd>World Domination, Deep Sea Diving, Murder Most Foul</dd>
            
            <dd class="clear"></dd>
            
            <dt>References</dt>
            <dd>Available on request</dd>
            
            <dd class="clear"></dd>
        </dl>
        
        <div class="clear"></div>
    
    </div>
    <?php endwhile;?>


<?php else:?>
	<p class="alert alert-warning">No hay resultados</p>
<?php endif;?>
