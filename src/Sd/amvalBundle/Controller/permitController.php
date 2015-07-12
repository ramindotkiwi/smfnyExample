<?php

namespace Sd\amvalBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sd\amvalBundle\Entity\permit;
use Sd\amvalBundle\Form\permitType;

/**
 * permit controller.
 *
 */
class permitController extends Controller
{
    /**
     * Lists all permit entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SdamvalBundle:permit')->findAll();

        return $this->render('SdamvalBundle:permit:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new permit entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new permit();
        $form = $this->createForm(new permitType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('permit_show', array('id' => $entity->getId())));
        }

        return $this->render('SdamvalBundle:permit:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new permit entity.
     *
     */
    public function newAction()
    {
        $entity = new permit();
        $form   = $this->createForm(new permitType(), $entity);

        return $this->render('SdamvalBundle:permit:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a permit entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SdamvalBundle:permit')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find permit entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SdamvalBundle:permit:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing permit entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SdamvalBundle:permit')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find permit entity.');
        }

        $editForm = $this->createForm(new permitType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SdamvalBundle:permit:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing permit entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SdamvalBundle:permit')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find permit entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new permitType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('permit_edit', array('id' => $id)));
        }

        return $this->render('SdamvalBundle:permit:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a permit entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SdamvalBundle:permit')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find permit entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('permit'));
    }

    /**
     * Creates a form to delete a permit entity by id.
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
