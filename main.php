<?php
	function unite($nombre)
		{	
			switch($nombre)
			{
				case 1 :return "un";break;
				case 2 :return "deux";break;
				case 3 :return "trois";break;
				case 4 :return "quatre";break;
				case 5 :return "cinq";break;
				case 6 :return "six";break;
				case 7 :return "sept";break;
				case 8 :return "huit";break;
				case 9 :return "neuf";break;
				case 0 :return "";break;
			}
		}
		function dizaine($nombre)
		{
			switch($nombre)
			{
				case 10 :return "dix";break;
				case 20 :return "vingt";break;
				case 30 :return "trente";break;
				case 40 :return "quarante";break;
				case 50 :return "cinquante";break;
				case 60 :return "soixante";break;
				case 70 :return "soixante-dix";break;
				case 80 :return "quatre-vingt";break;
				case 90 :return "quatre-vingt-dix";break;
				case 100 :return "cent";break;
			}
		}
		
		function centaine($nombre)
		{		
			if($nombre<10)
			{
				return unite($nombre);
			}else if($nombre<20)
			{
				switch($nombre)
				{
					case 11: return "onze";break; 	
					case 12: return "douze";break; 	
					case 13: return "treize";break; 	
					case 14: return "quatorze";break; 	
					case 15: return "quinze";break; 	
					case 16: return "seize";break;
					default:
						$reste=$nombre%10;
						return dizaine(10)."-".unite($reste);
				}
			}else if($nombre<=69)
			{
				$reste=$nombre%10;
				$quotien=$nombre-$reste;
				if($reste==0)
				{
					return dizaine($quotien);
				}else{
					return dizaine($quotien)."-".unite($reste);
				}	
			}else if($nombre<80)
			{
				$moin=$nombre-60;
				if($nombre==70){return dizaine(70);
				}else{
					return dizaine(60)."-".centaine($moin);
				}	
			}else if($nombre<=90)
			{
				$reste=$nombre%10;
				$quotien=$nombre-$reste;
				if($reste==0)
				{
					return dizaine($quotien);
				}else{
					return dizaine($quotien)."-".unite($reste);
				}	
			}else if($nombre<=100)
			{
				$moin=$nombre-80;
				if($nombre==100){return dizaine(100);
				}else{
					return dizaine(80)."-".centaine($moin);
				}	
			}else if($nombre<200)
			{
				$reste=$nombre%100;
				return dizaine(100)."-".centaine($reste);
			}else{
				$reste=$nombre%100;
				$moin=$nombre-$reste;
				if($reste==0)
				{
					$quotien=$nombre/100;
					return unite($quotien)."-".dizaine(100);
				}else{
					$reste1=$nombre%100;
					$quotien=$nombre-$reste1;
					$reste=$quotien/100;
					return unite($reste)."-".dizaine(100)."-".centaine($reste1);
				}
			} 
		}
		
		
		function millieme($nombre)
		{
			if($nombre<=1000)
			{
				$reste=$nombre%1000;
				if($nombre==1000)
				{
					return "mille";
				}else{
					return centaine($nombre);
				}		
			}else if($nombre<1000000)
			{
				$reste=$nombre%1000;
				if($reste==0)
				{
					$quotien=$nombre/1000;
					return centaine($quotien)." ".millieme(1000);
				}else{
					$quotien=$nombre/1000;
					$reste=$nombre%1000;
					$quot=$nombre-$reste;
					return millieme($quot)." ".centaine($reste);
				}
			}else if($nombre<1000000000)
			{
				$reste=$nombre%1000000;
				if($reste==0)
				{
					$quotien=$nombre/1000000;
					return centaine($quotien)." "."millions ";
				}else{
					$quotien=$nombre/1000000;
					$reste=$nombre%1000000;
					$quot=$nombre-$reste;
					return millieme($quot)." ".millieme($reste);
				}
			}else if($nombre<2000000000000)
			{
				$reste=$nombre%1000000000;
				if($reste==0)
				{
					$quotien=$nombre/1000000000;
					return centaine($quotien)." "."milliards ";
				}else{
					$quotien=$nombre/1000000000;
					$reste=$nombre%1000000000;
					$quot=$nombre-$reste;
					return millieme($quot)." ".millieme($reste);
				}		
			}else{
				return "C' est variment trop d'argent";
			}
		}
?>