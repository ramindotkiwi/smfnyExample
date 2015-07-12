<?php

namespace Sd\amvalBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sd\amvalBundle\Entity\message;
use Sd\amvalBundle\Form\messageType;

/**
 * message controller.
 *
 */
class messageController extends Controller
{
    /**
     * Lists all message entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SdamvalBundle:message')->findAll();

        return $this->render('SdamvalBundle:message:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new message entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new message();
        $form = $this->createForm(new messageType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('message_show', array('id' => $entity->getId())));
        }

        return $this->render('SdamvalBundle:message:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new message entity.
     *
     */
    public function newAction()
    {
        $entity = new message();
        $form   = $this->createForm(new messageType(), $entity);

        return $this->render('SdamvalBundle:message:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a message entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SdamvalBundle:message')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find message entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SdamvalBundle:message:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing message entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SdamvalBundle:message')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find message entity.');
        }

        $editForm = $this->createForm(new messageType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SdamvalBundle:message:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing message entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SdamvalBundle:message')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find message entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new messageType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('message_edit', array('id' => $id)));
        }

        return $this->render('SdamvalBundle:message:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a message entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SdamvalBundle:message')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find message entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('message'));
    }

    /**
     * Creates a form to delete a message entity by id.
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
