<?php

namespace Enllasos\EnllasBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Enllasos\EnllasBundle\Entity\Enllas;
use Enllasos\EnllasBundle\Form\EnllasType;

/**
 * Enllas controller.
 *
 */
class EnllasController extends Controller
{

    /**
     * Lists all Enllas entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EnllasBundle:Enllas')->findAll();

        return $this->render('EnllasBundle:Enllas:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Enllas entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Enllas();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('enllas_show', array('id' => $entity->getId())));
        }

        return $this->render('EnllasBundle:Enllas:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Enllas entity.
     *
     * @param Enllas $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Enllas $entity)
    {
        $form = $this->createForm(new EnllasType(), $entity, array(
            'action' => $this->generateUrl('enllas_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Enllas entity.
     *
     */
    public function newAction()
    {
        $entity = new Enllas();
        $form   = $this->createCreateForm($entity);

        return $this->render('EnllasBundle:Enllas:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Enllas entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EnllasBundle:Enllas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Enllas entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EnllasBundle:Enllas:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Enllas entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EnllasBundle:Enllas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Enllas entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EnllasBundle:Enllas:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Enllas entity.
    *
    * @param Enllas $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Enllas $entity)
    {
        $form = $this->createForm(new EnllasType(), $entity, array(
            'action' => $this->generateUrl('enllas_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Enllas entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EnllasBundle:Enllas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Enllas entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('enllas_edit', array('id' => $id)));
        }

        return $this->render('EnllasBundle:Enllas:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Enllas entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('EnllasBundle:Enllas')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Enllas entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('enllas'));
    }

    /**
     * Creates a form to delete a Enllas entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('enllas_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
