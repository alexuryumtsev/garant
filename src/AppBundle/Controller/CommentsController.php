<?php
/**
 * Created by PhpStorm.
 * User: alexu
 * Date: 15.06.2019
 * Time: 12:18
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Comments;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CommentsController extends Controller
{
    /**
     * @Route("/comments", name="comments")
     */
    public function commentsAction(Request $request)
    {
        $post = Request::createFromGlobals();

        $name = $post->request->get('name');
        $comment = $post->request->get('comment');

        if ($post->request->has('submit')) {
            $em = $this->getDoctrine()->getManager();

            $getstrated = new Comments();
            $getstrated->setName($name);
            $getstrated->setComment($comment);
            $getstrated->setStatus(0);

            $em->persist($getstrated);
            $em->flush();
            $this->addFlash('success', 'Спасибо! Ваш отзыв отправлен!');
            return $this->redirectToRoute('comments');
        }

        return $this->render('comment.html.twig', array(
            'name' => $name,
            'comment'  => $comment,
        ));
    }
}