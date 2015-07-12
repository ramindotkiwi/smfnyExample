<?php

namespace Sd\amvalBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sd\amvalBundle\Entity\kala;
use Sd\amvalBundle\Form\kalaType;

/**
 * kala controller.
 *
 */
class kalaController extends Controller
{
    /**
     * Lists all kala entities.
     *
     */
    public function indexAction()
    {
        $this->container->get('security.context')->getToken();
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SdamvalBundle:kala')->findAll();

        return $this->render('SdamvalBundle:kala:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new kala entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new kala();
        $form = $this->createForm(new kalaType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('kala'));
        }

        return $this->render('SdamvalBundle:kala:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new kala entity.
     *
     */
    public function newAction()
    {
        $entity = new kala();
        $form   = $this->createForm(new kalaType(), $entity);

        return $this->render('SdamvalBundle:kala:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a kala entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SdamvalBundle:kala')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find kala entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SdamvalBundle:kala:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing kala entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SdamvalBundle:kala')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find kala entity.');
        }

        $editForm = $this->createForm(new kalaType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SdamvalBundle:kala:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing kala entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SdamvalBundle:kala')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find kala entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new kalaType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('kala'));
        }

        return $this->render('SdamvalBundle:kala:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a kala entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SdamvalBundle:kala')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find kala entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('kala'));
    }

    /**
     * Creates a form to delete a kala entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }

    public function searchAction(Request $request)
    {

        $this->get('session')->setFlash('notice','جستجو انجام شد');

        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SdamvalBundle:kala')->findByname($request->get("namesearch"));

        return $this->render('SdamvalBundle:kala:index.html.twig', array(
            'entities' => $entities,
        ));
    }


}
