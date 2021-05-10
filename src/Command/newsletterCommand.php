<?php
namespace App\Command;
 
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Command\Command;
use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Mailer\MailerInterface;


class newsletterCommand extends Command
{
    protected static $defaultName = 'app:newsletter';

    public function __construct(EntityManagerInterface $em, \Swift_Mailer $mailer){
        $this->em = $em;
        $this->mailer= $mailer;
        parent::__construct();
    }
    
    protected function configure()
    {
        $this->setDescription('Envoyer le mail a chaque utilisateur inscrit a la newsletter ');
    }
 
    protected function execute(InputInterface $input, OutputInterface $output)
    {
   
         
        $listeUser = $this->em->getRepository(User::class)->findAll();
        $nbMail = 0;
        
        //$listeUser = $this->getDoctrine()->getManager()->getRepository(User::class)->findAll();
    
        if(!empty($listeUser)){

            foreach($listeUser as $user){
                    $message = (new \Swift_Message('Compte activation'))
                        ->setSubject('Nouveau offert disponible')
                        ->setFrom('anouar.deve@gmail.com')
                        ->setTo($user->getEmail())
                        ->setBody("<p>Bonjour,</p><p> Noueau offrs sont disponible sur notre site, cliquer sur le lien suivant pou en savoir plus <br><br>
                        <a href='https://f2i-dev-14-ba-ka-pc.vercel.app/' >ici </a></p>" ,
                        'text/html');
                    $verif = $this->mailer->send($message);
                    if($verif){
                        $nbMail++;
                    }
                
            }
        }
        $output->writeln('Tout est Ok. Nombre de mail envoyé : '.$nbMail);
        return $nbMail; 
    }
}

