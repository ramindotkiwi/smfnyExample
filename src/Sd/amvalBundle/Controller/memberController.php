<?php

namespace Sd\amvalBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sd\amvalBundle\Entity\member;
use Sd\amvalBundle\Form\memberType;

/**
 * member controller.
 *
 */
class memberController extends Controller
{
    /**
     * Lists all member entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SdamvalBundle:member')->findAll();

        return $this->render('SdamvalBundle:member:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new member entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new member();
        $form = $this->createForm(new memberType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('member_show', array('id' => $entity->getId())));
        }

        return $this->render('SdamvalBundle:member:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new member entity.
     *
     */
    public function newAction()
    {
        $entity = new member();
        $form   = $this->createForm(new memberType(), $entity);

        return $this->render('SdamvalBundle:member:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a member entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SdamvalBundle:member')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find member entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SdamvalBundle:member:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing member entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SdamvalBundle:member')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find member entity.');
        }

        $editForm = $this->createForm(new memberType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SdamvalBundle:member:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing member entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SdamvalBundle:member')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find member entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new memberType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('member_edit', array('id' => $id)));
        }

        return $this->render('SdamvalBundle:member:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a member entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SdamvalBundle:member')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find member entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('member'));
    }

    /**
     * Creates a form to delete a member entity by id.
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
}
