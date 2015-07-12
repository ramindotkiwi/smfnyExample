<?php

namespace Sd\amvalBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sd\amvalBundle\Entity\category;
use Sd\amvalBundle\Form\categoryType;

/**
 * category controller.
 *
 */
class categoryController extends Controller
{
    /**
     * Lists all category entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SdamvalBundle:category')->findAll();

        return $this->render('SdamvalBundle:category:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new category entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new category();
        $form = $this->createForm(new categoryType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('category_show', array('id' => $entity->getId())));
        }

        return $this->render('SdamvalBundle:category:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new category entity.
     *
     */
    public function newAction()
    {
        $entity = new category();
        $form   = $this->createForm(new categoryType(), $entity);

        return $this->render('SdamvalBundle:category:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a category entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SdamvalBundle:category')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find category entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SdamvalBundle:category:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing category entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SdamvalBundle:category')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find category entity.');
        }

        $editForm = $this->createForm(new categoryType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SdamvalBundle:category:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing category entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SdamvalBundle:category')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find category entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new categoryType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('category_edit', array('id' => $id)));
        }

        return $this->render('SdamvalBundle:category:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a category entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SdamvalBundle:category')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find category entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('category'));
    }

    /**
     * Creates a form to delete a category entity by id.
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
