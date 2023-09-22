<?php

namespace App\DataFixtures;

use App\Entity\Sock;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

;

class SockFixtures extends Fixture implements DependentFixtureInterface
{
    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $sock1 = new Sock();
        $sock1->setUsername('Benjamin');
        $sock1->setEmail('benjamin.forest@gmail.com');
        $sock1->setPassword($this->hasher->hashPassword($sock1, 'benjamin'));
        $sock1->setStory("Benjamin était un petit garçon de six ans, plein d'énergie et d'imagination. Il aimait explorer le monde qui l'entourait, inventant des aventures fantastiques avec ses jouets et ses amis. Mais un jour, alors qu'il se préparait pour une aventure en plein air, il rencontra un problème inhabituel : il avait perdu une de ses chaussettes.

        Ce matin-là, le soleil brillait et l'herbe était verte. Benjamin avait prévu une journée d'exploration dans le jardin avec son chien, Lucky, et son ami de voisinage, Emma. Il avait enfilé son short, son t-shirt préféré et cherchait sa paire de chaussettes pour être bien préparé à sa grande expédition.
        
        Cependant, quand il fouilla son tiroir de chaussettes, il réalisa qu'une chaussette manquait. La chaussette gauche de sa paire préférée, celle avec des rayures colorées, avait tout simplement disparu. Il fouilla son tiroir plusieurs fois, espérant que la chaussette réapparaîtrait par magie, mais elle était introuvable.
        
        Benjamin commença à paniquer légèrement. Il avait déjà l'habitude de trouver des trésors cachés dans le jardin, mais une chaussette disparue était une énigme qu'il ne savait pas comment résoudre. Il courut à travers la maison en demandant de l'aide à ses parents, mais même eux ne purent trouver la chaussette manquante.
        
        L'excitation de l'aventure à venir commençait à s'estomper pour Benjamin. Il ne pouvait pas imaginer passer une journée entière d'exploration avec une seule chaussette. Cependant, Emma et Lucky étaient déterminés à l'aider. Ensemble, ils se mirent à chercher dans toute la maison. Ils regardèrent sous les meubles, dans les placards, sous le lit, et même dans la machine à laver, mais la chaussette était introuvable.
        
        Finalement, Benjamin eut une idée lumineuse. Il se rappela avoir joué à cache-cache avec Lucky dans le jardin la veille. Peut-être que la chaussette était tombée là-bas. Il emmena Emma et Lucky dehors et ils fouillèrent le jardin avec attention. Ils regardèrent dans les buissons, sous les arbres, et finalement, ils la trouvèrent. La chaussette était accrochée à une branche, secouée par le vent, comme si elle s'était transformée en drapeau de victoire.
        
        Benjamin sourit de joie en récupérant sa chaussette perdue. Il la remercia d'un baiser et l'enfila rapidement. La journée d'exploration pouvait enfin commencer. Avec Emma et Lucky à ses côtés, Benjamin partit à la découverte de toutes les aventures que le jardin avait à offrir.
        
        Cette journée-là, Benjamin apprit une leçon importante : parfois, même les plus petites pertes peuvent sembler être de grandes énigmes, mais avec de la persévérance et de l'aide de ses amis, on peut toujours les résoudre. Et cette aventure lui apprit que l'amitié et l'imagination étaient les trésors les plus précieux qu'il pouvait espérer trouver.");
        $sock1->setIsFound(true);
        $sock1->setIsMatched(false);
        $sock1->setColor($this->getReference('rouge'));
        $sock1->setPattern($this->getReference('sapin'));
        $manager->persist($sock1);
        $this->addReference('sock1', $sock1);

        $sock2 = new Sock();
        $sock2->setUsername('John');
        $sock2->setEmail('john.doe@gmail.com');
        $sock2->setPassword($this->hasher->hashPassword($sock2, 'john'));
        $sock2->setStory("John était un homme d'affaires accompli et très organisé. Il avait une routine bien établie pour chaque matin de la semaine. Il se levait à l'aube, enfilait son costume impeccable, prenait un café rapide et partait pour une journée bien remplie au bureau. Sa vie était réglée comme une horloge, et il n'avait jamais imaginé qu'un simple événement puisse la bouleverser, jusqu'au jour où il perdit une chaussette.

        Ce matin-là, John se préparait comme d'habitude. Il avait choisi un costume gris foncé, une chemise blanche et une cravate assortie. Tout allait bien jusqu'à ce qu'il fouille son tiroir de chaussettes pour trouver une paire noire pour compléter sa tenue. C'est alors qu'il réalisa qu'il manquait une chaussette.
        
        John fronça les sourcils, surpris et légèrement agacé. Il vérifia une deuxième fois, puis une troisième, mais la chaussette noire semblait avoir disparu. Il examina sa chambre, fouillant sous le lit, dans le placard, derrière la commode, mais en vain. La chaussette demeurait introuvable.
        
        Il se mit à se demander comment cela avait pu se produire. Il était sûr d'avoir rangé toutes ses chaussettes correctement après la lessive de la veille. Il se creusa la tête pour se rappeler où il aurait pu l'oublier. Il vérifia même les endroits les plus improbables de la maison, comme le garage et la salle de bains, mais rien n'y fit.
        
        John commença à devenir obsédé par la chaussette perdue. Il fouilla son bureau au travail, sa voiture, et même ses dossiers, au cas où il l'aurait malencontreusement emportée avec lui. Ses collègues se moquèrent gentiment de lui, et certains lui suggérèrent de simplement porter une autre paire de chaussettes noires, mais John ne pouvait pas lâcher prise.
        
        Les jours passèrent, puis les semaines, et la chaussette restait introuvable. John commença à se demander s'il avait accidentellement aspiré la chaussette avec le videur, ou si un lutin farceur l'avait emportée. Il avait l'impression que cette simple chaussette avait le pouvoir de perturber sa vie parfaitement organisée.
        
        Finalement, un mois plus tard, alors qu'il cherchait un stylo dans son bureau, John ouvrit un tiroir et découvrit sa chaussette noire, soigneusement pliée sous une pile de papiers. Il ne pouvait pas croire ses yeux. Il avait cherché partout, mais il n'avait jamais pensé à regarder dans ce tiroir.
        
        John éclata de rire, un rire mêlé de soulagement et de légère honte. Comment avait-il pu être aussi obnubilé par une simple chaussette ? Il réalisa que parfois, même les personnes les plus organisées peuvent perdre le contrôle sur les détails de la vie quotidienne. Il enfila sa chaussette retrouvée avec un sourire, se promettant de ne plus jamais laisser une petite perte le perturber de la sorte. Et il retourna à sa routine bien ordonnée, prêt à affronter les défis de la journée, peu importe leur taille.");
        $sock2->setIsFound(true);
        $sock2->setIsMatched(false);
        $sock2->setColor($this->getReference('bleu'));
        $sock2->setPattern($this->getReference('banane'));
        $manager->persist($sock2);
        $this->addReference('sock2', $sock2);

        $sock3 = new Sock();
        $sock3->setUsername('Jacques');
        $sock3->setEmail('jacques.dupont@gmail.com');
        $sock3->setPassword($this->hasher->hashPassword($sock3, 'jacques'));
        $sock3->setStory("Jacques était un homme d'habitudes, un adepte du quotidien bien réglé. Chaque matin, il se levait à la même heure, enfilait le même costume impeccable et prenait son petit-déjeuner exactement à 7 heures. Sa vie était un modèle de routine, et il aimait ça. Mais un jour, un petit événement allait chambouler sa routine bien huilée : la perte d'une chaussette.

        Tout a commencé un matin d'hiver glacial. Jacques se préparait comme d'habitude, s'efforçant de suivre chaque étape de sa routine à la lettre. Il avait choisi son costume gris foncé, sa chemise blanche et sa cravate rayée préférée. Il était en train de chercher ses chaussettes, quand soudain, il réalisa qu'il manquait une chaussette noire.
        
        Jacques avait toujours pris soin de ses affaires, et il était absolument certain qu'il avait rangé soigneusement toutes ses chaussettes dans le tiroir de sa commode la veille. Il vérifia chaque coin de sa chambre, retourna son lit, regarda sous le tapis, mais la chaussette manquante restait introuvable.
        
        Intrigué et légèrement agacé, Jacques décida de repousser sa recherche à plus tard. Il enfila une autre paire de chaussettes noires qui ne correspondaient pas tout à fait à la première, mais il n'allait pas laisser une simple chaussette perturber sa journée.
        
        Cependant, la perte de cette chaussette commença à obséder Jacques. Il se mit à repenser à sa journée précédente, à essayer de reconstituer tous ses mouvements, mais rien n'expliquait la disparition mystérieuse de sa chaussette. Il fouilla à nouveau sa chambre, la cuisine, le salon, et même la salle de bains, mais en vain.
        
        Les jours passèrent, et la chaussette demeurait introuvable. Jacques commença à devenir légèrement superstitieux, se demandant si cette disparition avait un sens caché. Il commença à se méfier de tout, à éviter de marcher sous les échelles et à s'inquiéter de chaque chat noir croisant son chemin.
        
        Ses amis et sa famille se moquèrent gentiment de lui, l'appelant 'Jacques, le chaussettophobe'. Mais Jacques était déterminé à résoudre ce mystère et à récupérer sa chaussette perdue.
        
        Finalement, plusieurs semaines plus tard, alors qu'il était en train de ranger des documents dans son bureau, Jacques eut une illumination. Il avait l'habitude de retirer ses chaussures et de les laisser sous son bureau en arrivant chez lui. Il se baissa et fouilla sous son bureau, et là, entre des piles de papiers, il trouva sa chaussette noire, froissée et légèrement poussiéreuse.
        
        Jacques éclata de rire, mélange de soulagement et de perplexité. Comment cette chaussette avait-elle pu atterrir là ? Il ne le saurait jamais. Mais il était heureux de retrouver cette chaussette qui l'avait tant préoccupé. Il décida que parfois, il valait mieux accepter les petits mystères de la vie et ne pas laisser une simple chaussette perturber sa routine bien réglée. Il la remit soigneusement dans le tiroir de sa commode, où elle retrouva sa place dans sa collection de chaussettes parfaitement assorties. Et Jacques continua sa vie, un peu plus détendu et prêt à affronter les mystères imprévus qui pourraient se présenter sur son chemin.");
        $sock3->setIsFound(false);
        $sock3->setIsMatched(false);
        $sock3->setColor($this->getReference('vert'));
        $sock3->setPattern($this->getReference('sapin'));
        $manager->persist($sock3);
        $this->addReference('sock3', $sock3);

        $sock4 = new Sock();
        $sock4->setUsername('Sarah');
        $sock4->setEmail('sarah.flip@gmail.com');
        $sock4->setPassword($this->hasher->hashPassword($sock4, 'sarah'));
        $sock4->setStory("Sarah était une jeune fille joyeuse et pleine de vie. Elle aimait passer son temps à explorer les recoins de sa petite ville, à escalader les arbres, à courir dans les parcs et à découvrir de nouvelles aventures. Mais un jour, alors qu'elle se préparait pour une journée bien remplie, un petit incident allait changer le cours de sa journée : elle avait perdu l'une de ses chaussettes.

        La matinée avait commencé comme toutes les autres. Sarah s'était levée avec un grand sourire, prête à vivre une nouvelle aventure. Elle avait choisi sa tenue préférée : une robe à motifs floraux, des collants rayés et ses baskets de randonnée préférées. Elle avait parcouru sa chambre pour trouver une paire de chaussettes assorties. Elle les avait enfilées rapidement, mais en préparant son petit-déjeuner, elle avait remarqué qu'il manquait une chaussette.
        
        Sarah avait cherché partout dans sa chambre. Elle avait fouillé sous le lit, dans son armoire, sous le tapis, mais la chaussette semblait s'être volatilisée. Elle se dit que peut-être elle l'avait perdue dans la salle de bains, alors elle se précipita là-bas pour vérifier. Elle fouilla les étagères, les placards, et même la baignoire, mais la chaussette restait introuvable.
        
        Elle commença à se demander comment une simple chaussette pouvait disparaître aussi mystérieusement. Elle essaya de se rappeler si elle l'avait peut-être laissée dans la machine à laver, mais elle était certaine de ne pas l'avoir mise dedans. Elle était de plus en plus perplexe.
        
        Sarah décida de ne pas laisser cette perte gâcher sa journée. Elle enfila une autre paire de chaussettes qui ne correspondaient pas tout à fait à sa tenue, mais ce n'était pas si grave. Elle sortit de chez elle et se lança dans sa journée d'aventure habituelle.
        
        Elle passa la matinée à explorer un parc voisin, grimpant aux arbres, jouant au frisbee avec des amis et riant aux éclats. Elle avait presque oublié la chaussette perdue, se laissant emporter par le plaisir de l'instant présent.
        
        L'après-midi, alors qu'elle marchait le long d'une rivière, elle aperçut quelque chose de curieux coincé entre les pierres près de l'eau. C'était sa chaussette manquante, mouillée et un peu sale. Elle avait probablement glissé de sa poche pendant qu'elle jouait au frisbee.
        
        Sarah sourit en ramassant la chaussette et la rinça rapidement dans la rivière. Elle se dit que parfois, même les petites pertes peuvent être retrouvées lorsque l'on s'y attend le moins. Elle mit la chaussette mouillée dans son sac à dos, prête à la ramener chez elle et à la laver. Cette journée avait été une nouvelle aventure, et Sarah avait appris qu'il fallait parfois laisser les choses se dérouler comme elles le voulaient, même si cela signifiait perdre une chaussette en chemin.");
        $sock4->setIsFound(false);
        $sock4->setIsMatched(false);
        $sock4->setColor($this->getReference('bleu'));
        $sock4->setPattern($this->getReference('objets'));
        $manager->persist($sock4);
        $this->addReference('sock4', $sock4);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ColorFixtures::class,
            PatternFixtures::class,
        ];
    }
}
