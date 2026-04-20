import { defineCollection, z } from "astro:content";

const pillars = defineCollection({
  type: "content",
  schema: z.object({
    order: z.number(),
    anchor: z.string(),
    eyebrow: z.string(),
    title: z.string(),
    lede: z.string(),
    situation: z.string(),
    features: z.array(
      z.object({
        title: z.string(),
        description: z.string(),
      }),
    ),
    keyMessage: z.string(),
    galleryLayout: z.enum(["phones", "screens"]).optional(),
    gallery: z
      .array(
        z.object({
          src: z.string(),
          alt: z.string(),
          caption: z.string(),
        }),
      )
      .optional(),
  }),
});

const sections = defineCollection({
  type: "content",
  schema: z.object({
    eyebrow: z.string().optional(),
    title: z.string(),
    lede: z.string().optional(),
  }),
});

export const collections = {
  pillars,
  sections,
};
