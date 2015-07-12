<?php

namespace Sd\amvalBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sd\amvalBundle\Entity\subset;
use Sd\amvalBundle\Form\subsetType;

/**
 * subset controller.
 *
 */
class subsetController extends Controller
{
    /**
     * Lists all subset entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SdamvalBundle:subset')->findAll();

        return $this->render('SdamvalBundle:subset:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new subset entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new subset();
        $form = $this->createForm(new subsetType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('subset'));
        }

        return $this->render('SdamvalBundle:subset:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new subset entity.
     *
     */
    public function newAction()
    {
        $entity = new subset();
        $form   = $this->createForm(new subsetType(), $entity);

        return $this->render('SdamvalBundle:subset:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a subset entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SdamvalBundle:subset')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find subset entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SdamvalBundle:subset:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing subset entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SdamvalBundle:subset')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find subset entity.');
        }

        $editForm = $this->createForm(new subsetType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SdamvalBundle:subset:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing subset entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SdamvalBundle:subset')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find subset entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new subsetType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('subset_edit', array('id' => $id)));
        }

        return $this->render('SdamvalBundle:subset:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a subset entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SdamvalBundle:subset')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find subset entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('subset'));
    }

    /**
     * Creates a form to delete a subset entity by id.
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
